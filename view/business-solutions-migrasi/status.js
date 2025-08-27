$(document).ready(function () {
  // Fungsi untuk memformat angka Rupiah dengan pemisah ribuan
  function formatRupiah(angka) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split = number_string.split(','),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang diinput sudah menjadi angka ribuan
    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return rupiah;
  }

  // Event listener untuk input dinamis
  $(document).on('input', '.nominal', function () {
    var original_value = $(this)
      .val()
      .replace(/[^,\d]/g, ''); // Hapus karakter selain angka
    $(this).val(formatRupiah(original_value)); // Format dengan pemisah ribuan
  });

  // Fungsi untuk menginisialisasi DataTable
  const table = $('#tabel_permit_status').DataTable({
    processing: true,
    responsive: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    ajax: {
      url: '../../models/business_solutions_status.php',
      type: 'POST',
      data: function (d) {
        d.created_by = $('#filter').val(); // Mengirim nilai dari dropdown ke server
      },
    },
    columns: [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        },
      },
      {
        data: 'is_hot_prospek',
        render: function (data) {
          return data == 1 ? '⭐' : '-';
        },
      },
      {
        data: 'kode',
        render: function (data) {
          return data ? data : '-';
        },
      },
      { data: 'kelurahan' },
      { data: 'pic_permit' },
      {
        data: 'status',
        render: function (data) {
          const statusBadges = {
            inisiasi: 'primary',
            follow_up: 'info',
            negosiasi: 'warning',
            closing: 'success',
            control_visit: 'danger',
          };
          return data == null
            ? '-'
            : `<small class="badge badge-${statusBadges[data] || 'secondary'} text-uppercase">${
                data == 'inisiasi' ? 'contacted' : data == 'follow_up' ? 'send offer' : data == 'negosiasi' ? 'negotiation' : data == 'closing' ? 'deal' : 'lost'
              }</small>`;
        },
      },
      { data: 'permit' },
      { data: 'keterangan' },
      { data: 'created_at' },
      {
        data: 'leadtime',
        render: function (data) {
          return data ? data + ' hari' : '-';
        },
      },
      {
        data: null,
        render: function (data, type, row) {
          return `<div class="btn-group" role="group" aria-label="Action Buttons" style="width: 100%">
          <button type="button" class="btn btn-info view-details" title="Lihat Detail" data-id="${data.key_fal}" data-kode="${data.kode}"><i class="fas fa-info-circle"></i></button>
          <button type="button" class="btn btn-warning toggle-hot-prospek" title="Ubah Status Hot Prospek" data-id="${data.key_fal}" data-status="${data.is_hot_prospek}"><i class="fas fa-star"></i></button>
        </div>`;
        },
        orderable: false,
        searchable: false,
      },
    ],
  });

  // Event listener untuk memuat ulang tabel ketika nilai dropdown berubah
  $('#filter').on('change', function () {
    table.ajax.reload(); // Memuat ulang DataTable saat dropdown berubah
  });

  // Event delegation untuk klik pada button view details
  $(document).on('click', '.view-details', function () {
    var key_fal = $(this).data('id'); // Ambil key_fal dari data-id di button
    var kode = $(this).data('kode'); // Ambil kode dari data-kode di button

    // Lakukan permintaan AJAX ke backend untuk mendapatkan data berdasarkan key_fal
    $.ajax({
      url: '../../models/business_solutions_komitmen_pembayaran.php',
      type: 'POST',
      data: { key_fal: key_fal },
      success: function (response) {
        if (response.status === 200) {
          var data = response.data;
          var modalContent = '';

          // Generate rows untuk tabel modal
          data.forEach(function (item, index) {
            const dokumentasiButton = item.dokumentasi
              ? `<button type="button" class="btn btn-info view-dokumentasi" title="Lihat Dokumentasi" data-title="Dokumentasi" data-src="../../${item.dokumentasi}"><i class="fas fa-folder-open"></i></button>`
              : '';

            const beritaAcaraButton = item.berita_acara
              ? `<button type="button" class="btn btn-info view-dokumentasi" title="Lihat BA Kerjasama" data-title="BA Kerjasama" data-src="../../${item.berita_acara}"><i class="fas fa-file-alt"></i></button>`
              : '';

            const EditButton =
              sessionUsername.includes('pandu') || sessionUsername === 'pandu'
                ? ''
                : `<button 
                type="button"
                permit_status_id="${item.permit_status_id}"
                pic="${item.pic}"
                status="${item.status}"
                total_komitmen="${item.total_komitmen}"
                deskripsi_komitmen="${item.deskripsi_komitmen}"
                termin_pembayaran="${item.termin_pembayaran}"
                keterangan="${item.keterangan}"
                class="btn btn-warning editPermitStatus" title="Edit"><i class="fas fa-pencil-alt"></i>
            </button>`;

            const statusBadges = {
              inisiasi: 'primary',
              follow_up: 'info',
              negosiasi: 'warning',
              closing: 'success',
              control_visit: 'danger',
            };

            const badgeStatus = item.status
              ? `<small class="badge badge-${statusBadges[item.status] || 'secondary'} text-uppercase">${
                  item.status == 'inisiasi' ? 'contacted' : item.status == 'follow_up' ? 'send offer' : item.status == 'negosiasi' ? 'negotiation' : item.status == 'closing' ? 'deal' : 'lost'
                }</small>`
              : '-';

            function formatTerminPembayaran(termin) {
              if (!termin) return '-'; // Jika tidak ada nilai termin, tampilkan '-'

              // Pisahkan nilai termin berdasarkan '_'
              const terminParts = termin.split('_');
              const number = terminParts[0]; // Angka (1, 3, 6, dsb)
              const label = terminParts[1]; // "bulan"

              // Gabungkan angka dan label untuk format yang lebih mudah dibaca
              return `${number} ${label.charAt(0).toUpperCase() + label.slice(1)}`; // "1 Bulan"
            }

            modalContent += `
            <tr>
                <td>${index + 1}</td>
                <td>${item.pic}</td>
                <td>${badgeStatus}</td>
                <td>${item.metode_followup}</td>
                <td>${item.total_komitmen || '-'}</td>
                <td>${item.deskripsi_komitmen || '-'}</td>
                <td>${formatTerminPembayaran(item.termin_pembayaran) || '-'}</td>
                <td>${item.keterangan}</td>
                <td>${item.created_at}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Action Buttons" style="width: 100%;">
                        ${dokumentasiButton}
                        ${beritaAcaraButton}
                        ${EditButton}
                    </div>
                </td>
            </tr>`;
          });

          // Hapus DataTables yang ada jika ada
          if ($.fn.DataTable.isDataTable('#modalDataTable')) {
            $('#modalDataTable').DataTable().clear().destroy();
          }

          // Masukkan data ke dalam tbody
          $('#modalDataTable tbody').html(modalContent);

          // Inisialisasi DataTables
          $('#modalDataTable').DataTable({
            processing: true,
            responsive: true,
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
          });

          // Update judul modal dengan data-id
          kode == null ? $('#viewPermitStatusDetailsModalLabel').text('Status Details') : $('#viewPermitStatusDetailsModalLabel').text(`Status Details - Kode: ${kode}`);

          // Update tombol "Tambah Status" dengan data-id
          $('.insertTambahPermitStatus').data('id', key_fal);

          // Tampilkan modal
          $('#viewPermitStatusDetailsModal').modal('show');
        } else {
          console.error('Terjadi kesalahan: ' + response.message);
        }
      },
      error: function (xhr, status, error) {
        console.error('Terjadi kesalahan:', error);
      },
    });
  });

  $(document).on('click', '.toggle-hot-prospek', function () {
    const id = $(this).data('id');
    const currentStatus = $(this).data('status');

    // Tampilkan SweetAlert konfirmasi pertama
    Swal.fire({
      title: 'Konfirmasi',
      text: `Apakah Anda yakin ingin mengubah status menjadi ${currentStatus == 1 ? 'Bukan Hot Prospek' : 'Hot Prospek'}?`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, ubah status!',
      cancelButtonText: 'Batal',
    }).then((result) => {
      if (result.isConfirmed) {
        // Kirim request ke backend untuk mengubah status
        $.ajax({
          url: '../../controller/toggle_hot_prospek_status.php',
          method: 'POST',
          data: { id: id, status: currentStatus, updated_by: sessionUsername },
          success: function (response) {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
              },
            });

            // Cek hasil dari server
            if (response == 1) {
              // Tampilkan Toast konfirmasi berhasil
              Toast.fire({
                icon: 'success',
                title: `Alhamdulillah status berhasil diubah menjadi ${currentStatus == 1 ? 'Bukan Hot Prospek' : 'Hot Prospek'}`,
              });
              table.ajax.reload(); // Memuat ulang DataTable
            } else {
              // Tampilkan Toast jika ada kesalahan
              Toast.fire({
                icon: 'error',
                title: 'Maaf, ada yang salah saat mengubah status',
              });
            }
          },
          error: function () {
            // Tampilkan error jika terjadi kesalahan dalam pengiriman request
            Swal.fire({
              icon: 'error',
              title: 'Terjadi kesalahan',
              text: 'Tidak dapat menghubungi server. Silakan coba lagi.',
            });
          },
        });
      }
    });
  });

  // Event listener untuk perubahan status
  $('#status').on('change', function () {
    const status = this.value;
    const elements = ['total_komitmen', 'deskripsi_komitmen', 'berita_acara', 'termin_pembayaran'];
    const display = status === 'closing' ? 'block' : 'none';

    elements.forEach((id) => {
      const container = $(`#${id}`).parent();
      container.css('display', display);
      const element = $(`#${id}`);
      if (status === 'closing') {
        element.attr('required', 'required');
      } else {
        element.removeAttr('required').val('');
      }
    });
  });

  // Show modal
  $(document).on('click', '.insertTambahPermitStatus', function () {
    var key_fal = $(this).data('id');

    // Set nilai input di dalam modal
    $('#key_fal').val(key_fal);

    $('#modalInsertPermitStatus').modal('show');
  });

  // INSERT
  $('#addPermitStatusForm').submit(function (e) {
    e.preventDefault();

    $('.nominal').each(function () {
      var rawValue = $(this).val().replace(/\./g, ''); // Hapus pemisah ribuan
      $(this).val(rawValue); // Setel ulang ke nilai asli tanpa pemisah ribuan
    });

    // Mengambil data dari form
    const formData = new FormData(this);

    // Mengirim data ke backend menggunakan AJAX
    $.ajax({
      url: '../../controller/action_insert_business_solutions_status.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        Swal.fire('Alhamdulillah', 'Data business solutions status berhasil ditambah.', 'success').then(function (success) {
          window.location.reload(true);
        });
      },
      error: function (jqXHR) {
        alert(jqXHR);
      },
    });
  });

  // READ
  $(document).on('click', '.editPermitStatus', function () {
    // Ambil nilai dari elemen atribut tombol dan masukkan ke form input di modal edit
    var attributes = ['permit_status_id', 'pic', 'status', 'total_komitmen', 'deskripsi_komitmen', 'termin_pembayaran', 'keterangan'];

    attributes.forEach(
      function (attr) {
        // Format total_komitmen menggunakan formatRupiah saat diambil
        if (attr === 'total_komitmen') {
          $('#' + attr + '1').val(formatRupiah($(this).attr(attr), 'Rp.'));
        } else {
          $('#' + attr + '1').val($(this).attr(attr));
        }
      }.bind(this)
    );

    // Ambil nilai status
    var status = $(this).attr('status');

    // Cek jika status adalah 'closing'
    if (status === 'closing') {
      // Tampilkan elemen terkait
      $('#total_komitmen1').parent().show();
      $('#deskripsi_komitmen1').parent().show();
      $('#termin_pembayaran1').parent().show();
      $('#berita_acara1').parent().show();
    } else {
      // Sembunyikan elemen terkait
      $('#total_komitmen1').parent().hide();
      $('#deskripsi_komitmen1').parent().hide();
      $('#termin_pembayaran1').parent().hide();
      $('#berita_acara1').parent().hide();
    }

    // Tampilkan modal edit setelah data di-load
    $('#modalEditPermitStatus').modal('show');
  });

  // Event delegation untuk klik pada link dokumentasi/berita acara
  $(document).on('click', '.view-dokumentasi', function (e) {
    e.preventDefault();
    const imageSrc = $(this).data('src');
    const modalTitle = $(this).data('title');

    // Set the image source and modal title
    $('#modalImage').attr('src', imageSrc);
    $('#viewDokumentasiModalLabel').text(modalTitle);

    // Show the modal
    $('#viewDokumentasiModal').modal('show');
  });

  // Ketika sebuah modal ditutup, Bootstrap secara otomatis menghapus kelas 'modal-open' dari elemen body,
  // yang menyebabkan halaman bisa di-scroll lagi. Namun, jika masih ada modal lain yang terbuka,
  // kita harus menambahkan kembali kelas 'modal-open' ke elemen body agar scroll tetap terkunci.
  // Kode ini memastikan bahwa selama ada modal yang masih terlihat, halaman tetap tidak bisa di-scroll.
  $(document).on('hidden.bs.modal', '.modal', function () {
    if ($('.modal:visible').length) {
      $('body').addClass('modal-open');
    }
  });

  // UPDATE
  $('#updatePermitForm').on('submit', function (e) {
    e.preventDefault();

    $('.nominal').each(function () {
      var rawValue = $(this).val().replace(/\./g, ''); // Hapus pemisah ribuan
      $(this).val(rawValue); // Setel ulang ke nilai asli tanpa pemisah ribuan
    });

    // Mengambil data dari form
    const formData = new FormData(this);

    // Membuat instance baru dari FormData
    const newFormData = new FormData();

    // Mengiterasi FormData lama dan menambahkan ke FormData baru dengan key yang dimodifikasi
    formData.forEach((value, key) => {
      // Mengganti key dengan menghilangkan angka 1 dari akhir key
      const newKey = key.replace(/1$/, '');
      newFormData.append(newKey, value);
    });

    $.ajax({
      type: 'POST',
      url: '../../controller/action_edit_business_solutions_status.php',
      data: newFormData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        Swal.fire('Alhamdulillah', 'Data business solutions berhasil diperbarui.', 'success').then(function (success) {
          window.location.reload(true);
        });
      },
    });
  });

  // DELETE
  $('#deletePermitStatus').submit(function (e) {
    const permit_status_id = $(this).data('id');

    Swal.fire({
      title: 'Yakin ingin menghapus?',
      text: 'Data yang sudah dihapus tidak bisa dikembalikan!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!',
    }).then((result) => {
      if (result.isConfirmed) {
        // Kirim request ke server untuk menghapus data
        $.ajax({
          url: '../../controller/action_delete_permit_status.php',
          type: 'POST',
          data: { permit_status_id: permit_status_id },
          success: function (response) {
            Swal.fire('Deleted!', 'Data permit status berhasil dihapus.', 'success').then(function () {
              window.location.reload();
            });
          },
          error: function (xhr, status, error) {
            console.error('Terjadi kesalahan saat menghapus:', error);
            Swal.fire('Error', 'Gagal menghapus permit status', 'error');
          },
        });
      }
    });
  });
});
