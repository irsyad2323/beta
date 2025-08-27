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
  $('#tabel_permit_status').DataTable({
    processing: true,
    responsive: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    ajax: {
      url: '../../models/permit_status.php',
      type: 'POST',
    },
    columns: [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        },
      },
      {
        data: 'kode',
        render: function (data) {
          return data ? data : '-';
        },
      },
      { data: 'kelurahan' },
      { data: 'rw' },
      { data: 'rt' },
      { data: 'pic_permit' },
      {
        data: 'status',
        render: function (data) {
          const statusBadges = {
            closing: 'success',
            reject: 'danger',
            inisiasi_perkenalan: 'primary',
            negosiasi: 'warning',
            re_visit_followup: 'info',
          };
          return data == null ? '-' : `<small class="badge badge-${statusBadges[data] || 'secondary'} text-uppercase">${data}</small>`;
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
        data: 'status_tracking',
        render: function (data) {
          return data
            ? `<small class="badge badge-${
                data === 'rejected' ? 'danger' : data === 'Awaiting payment processing by finance' ? 'success' : data === 'Waiting for approval from the head of the unit' ? 'warning' : 'secondary'
              } text-uppercase">${data}</small>`
            : '-';
        },
      },
      {
        data: 'approval_head_of_unit_leadtime',
        render: function (data) {
          return data ? data + ' hari' : '-';
        },
      },
      {
        data: null,
        render: function (data, type, row) {
          return `<button type="button" class="btn btn-info view-details" title="Lihat Detail" data-id="${data.key_fal}" data-kode="${data.kode}"><i class="fas fa-info-circle"></i></button>`;
        },
        orderable: false,
        searchable: false,
      },
    ],
  });

  // Event delegation untuk klik pada button view details
  $(document).on('click', '.view-details', function () {
    var key_fal = $(this).data('id'); // Ambil key_fal dari data-id di button
    var kode = $(this).data('kode'); // Ambil kode dari data-kode di button

    // Lakukan permintaan AJAX ke backend untuk mendapatkan data berdasarkan key_fal
    $.ajax({
      url: '../../models/permit_komitmen_pembayaran.php',
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
              ? `<button type="button" class="btn btn-info view-dokumentasi" title="Lihat Partnership Kerjasama" data-title="Partnership Kerjasama" data-src="../../${item.berita_acara}"><i class="fas fa-file-alt"></i></button>`
              : '';

            const ktpButton = item.ktp ? `<button type="button" class="btn btn-info view-dokumentasi" title="Lihat KTP" data-title="KTP" data-src="../../${item.ktp}"><i class="fas fa-id-card"></i></button>` : '';

            const EditButton =
              sessionUsername.includes('pandu') || sessionUsername === 'pandu'
                ? ''
                : `<button 
                type="button"
                permit_status_id="${item.permit_status_id}"
                pic="${item.pic}"
                status="${item.status}"
                metode_followup="${item.metode_followup}"
                total_komitmen="${item.total_komitmen}"
                deskripsi_komitmen="${item.deskripsi_komitmen}"
                keterangan="${item.keterangan}"
                class="btn btn-warning editPermitStatus" title="Edit" data-id="${item.permit_status_id}"><i class="fas fa-pencil-alt"></i>
            </button>`;

            modalContent += `
            <tr>
                <td>${index + 1}</td>
                <td>${item.pic}</td>
                <td>${item.status}</td>
                <td>${item.metode_followup}</td>
                <td>${item.total_komitmen || '-'}</td>
                <td>${item.deskripsi_komitmen || '-'}</td>
                <td>${item.keterangan}</td>
                <td>${item.created_at}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Action Buttons" style="width: 100%;">
                        ${dokumentasiButton}
                        ${beritaAcaraButton}
                        ${ktpButton}
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
          kode == null ? $('#viewPermitStatusDetailsModalLabel').text('Relationship Status Details') : $('#viewPermitStatusDetailsModalLabel').text(`Relationship Status Details - Kode: ${kode}`);

          // Update tombol "Tambah Relationship Status" dengan data-id
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

  // Event listener untuk perubahan status
  $('#status').on('change', function () {
    const status = this.value;
    const elements = ['total_komitmen', 'deskripsi_komitmen', 'berita_acara', 'ktp'];
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

    if (status === 'closing') {
      $('.form_add_elements_insert').show();
      $('.form_add_elements_insert').find('input').prop('required', true);
    } else {
      $('.form_add_elements_insert').hide();
      $('.form_add_elements_insert').find('input').prop('required', false);
    }
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
      url: '../../controller/action_insert_permit_status_update.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        Swal.fire('Alhamdulillah', 'Data permit status berhasil ditambah.', 'success').then(function (success) {
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
    // Ambil permit_status_id dari atribut tombol edit
    var permit_status_id = $(this).data('id');

    // Ambil nilai dari elemen atribut tombol dan masukkan ke form input di modal edit
    var attributes = ['permit_status_id', 'pic', 'status', 'metode_followup', 'total_komitmen', 'deskripsi_komitmen', 'keterangan'];

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

    // Kirim request ke backend untuk mendapatkan data komitmen pembayaran dinamis
    $.ajax({
      url: '../../models/get_data_komitmen_pembayaran_for_edit.php',
      type: 'POST',
      data: { permit_status_id: permit_status_id },
      dataType: 'json',
      success: function (response) {
        // Periksa status response
        if (response.status === 200) {
          // Hapus elemen dinamis sebelumnya dari modal edit
          $('.form_add_elements_row_edit').remove();
          $('.form_add_elements_edit').empty(); // Kosongkan konten jika tidak ada data

          // Periksa apakah ada data dalam response
          if (response.data && Array.isArray(response.data)) {
            if (response.data.length > 0) {
              // Isi field dinamis berdasarkan data dari server
              response.data.forEach(function (item, index) {
                // Tentukan apakah input harus di-disable berdasarkan status
                var isEditable = item.status === 'unverified';
                var readonlyAttr = isEditable ? '' : 'readonly';
                var backgroundColorClass = isEditable ? 'bg-warning' : 'bg-success';
                var colClass = isEditable ? '6' : '2';

                // Format nominal menggunakan formatRupiah
                var formattedNominal = formatRupiah(item.nominal, 'Rp.');

                // Siapkan HTML untuk row baru
                var newRow = `
                        <div class="row g-3 form_add_elements_row_edit mb-3 text-white ${backgroundColorClass}">
                          <input class="form-control" type="hidden" id="edit_id_${index + 1}" name="id[]" value="${item.id}">
                          <div class="form-row col-sm-${colClass}">
                            <label for="edit_jadwal_bayar_${index + 1}">Jadwal Bayar ${isEditable ? '<span class="text-danger">*</span>' : ''}</label>
                            <input class="form-control" type="date" id="edit_jadwal_bayar_${index + 1}" name="jadwal_bayar[]" value="${item.jadwal_bayar}" ${readonlyAttr} required>
                          </div>
                          <div class="form-row col-sm-${colClass}">
                            <label for="edit_nominal_${index + 1}">Nominal ${isEditable ? '<span class="text-danger">*</span>' : ''}</label>
                            <input class="form-control nominal" type="text" id="edit_nominal_${index + 1}" name="nominal[]" value="${formattedNominal}" placeholder="0" autocomplete="off" ${readonlyAttr} required>
                          </div>
                          ${
                            isEditable
                              ? // Tidak menampilkan kolom kwitansi jika status 'unverified'
                                ''
                              : `
                                  <div class="form-row col-sm-${colClass}">
                                      <label for="edit_actual_bayar_${index + 1}">Actual Jadwal Bayar</label>
                                      <input class="form-control" type="date" id="edit_actual_bayar_${index + 1}" value="${item.actual_bayar}" disabled>
                                  </div>
                                  <div class="form-row col-sm-${colClass}">
                                      <label for="edit_actual_nominal_${index + 1}">Actual Nominal</label>
                                      <input class="form-control nominal" type="text" id="edit_actual_nominal_${index + 1}" value="${item.actual_nominal}" placeholder="0" autocomplete="off" disabled>
                                  </div>
                                `
                          }
                          <div class="form-row col-sm-4" style="${isEditable ? 'display:none;' : ''}">
                              <label for="edit_kwitansi_${index + 1}">Kwitansi </label>
                              <input type="file" name="kwitansi[]" class="form-control-file input-design" id="edit_kwitansi_${index + 1}">
                              ${item.kwitansi ? `<a href="../../${item.kwitansi}" target="_blank">Lihat Kwitansi</a>` : ''}
                          </div>
                        </div>`;

                // Append elemen dinamis ke dalam modal edit, bukan modal tambah
                $('.form_add_elements_edit').append(newRow);
              });

              // Tampilkan elemen dengan mengubah display menjadi 'block'
              $('#total_komitmen1').parent().show();
              $('#deskripsi_komitmen1').parent().show();
              $('#berita_acara1').parent().show();
              $('#ktp1').parent().show();

              var newRowButton = `
                                  <div class="form-row col-sm-4 mt-3">
                                      <button type="button" class="btn btn-outline-success add_new_frm_field_btn_edit" title="Tambah baris baru"><i class="fas fa-plus"></i></button>
                                      <button type="button" class="btn btn-outline-danger mx-2 remove_node_btn_frm_field_edit" title="Hapus baris terakhir"><i class="fas fa-trash"></i></button>
                                  </div>
                                  `;

              $('.form_add_elements_edit').append(newRowButton);
            } else {
              // Sembunyikan elemen dengan mengubah display menjadi 'none'
              $('#total_komitmen1').parent().hide();
              $('#deskripsi_komitmen1').parent().hide();
              $('#berita_acara1').parent().hide();
              $('#ktp1').parent().hide();
            }
          } else {
            console.error('Data tidak ditemukan dalam response');
          }

          // Tampilkan modal edit setelah data di-load
          $('#modalEditPermitStatus').modal('show');
        } else {
          console.error('Terjadi kesalahan: ' + response.message);
        }
      },
      error: function (xhr, status, error) {
        console.error('Terjadi kesalahan saat mengambil data:', error);
      },
    });
  });

  // Event delegation untuk klik pada link dokumentasi/berita acara/ktp
  $(document).on('click', '.view-dokumentasi', function (e) {
    e.preventDefault();
    const fileSrc = $(this).data('src');
    const modalTitle = $(this).data('title');

    // Tentukan apakah file adalah gambar atau PDF
    const fileExtension = fileSrc.split('.').pop().toLowerCase();
    const isImage = ['jpg', 'jpeg', 'png', 'gif', 'bmp'].includes(fileExtension);
    const isPDF = fileExtension === 'pdf';

    // Set judul modal
    $('#viewDokumentasiModalLabel').text(modalTitle);

    // Bersihkan konten modal
    $('#modalContent').empty();

    if (isImage) {
      // Jika file adalah gambar
      $('#modalContent').html(`<img id="modalImage" src="${fileSrc}" class="img-fluid" alt="Dokumentasi">`);
    } else if (isPDF) {
      // Jika file adalah PDF
      $('#modalContent').html(`<iframe src="${fileSrc}" width="100%" height="500px"></iframe>`);
    } else {
      // Jika file bukan gambar atau PDF, tampilkan pesan
      $('#modalContent').html('<p>File tidak didukung untuk pratinjau.</p>');
    }

    // Tampilkan modal
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
      url: '../../controller/action_edit_permit_status_update.php',
      data: newFormData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        Swal.fire('Alhamdulillah', 'Data permit berhasil diperbarui.', 'success').then(function (success) {
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

  // Fungsi untuk mengatur tombol "Hapus" di Modal
  function updateRemoveButtonState(action) {
    // Menghitung jumlah baris dalam konteks yang diberikan
    var totalRows = $(`.form_add_elements_${action}`).find(`.form_add_elements_row_${action}`).length;

    // Menentukan status tombol berdasarkan jumlah baris
    var isDisabled = totalRows <= 1;
    $(`.remove_node_btn_frm_field_${action}`).prop('disabled', isDisabled);
  }

  // Modal Insert
  // Menambah baris baru
  $('body').on('click', '.add_new_frm_field_btn_insert', function () {
    var index = $('.form_add_elements_insert').find('.form_add_elements_row_insert').length + 1;

    $('.form_add_elements_insert').find('.form_add_elements_row_insert:last').after(`
            <div class="mb-3 row g-3 form_add_elements_row_insert">
                <!-- Jadwal Bayar -->
                <div class="form-row col-sm-6">
                    <label for="jadwal_bayar_${index}">Jadwal Bayar <span class="text-danger">*</span></label>
                    <input class="form-control" type="date" id="jadwal_bayar_${index}" name="jadwal_bayar[]" required>
                </div>

                <!-- Nominal -->
                <div class="form-row col-sm-6">
                    <label for="nominal_${index}">Nominal <span class="text-danger">*</span></label>
                    <input class="form-control nominal" type="text" id="nominal_${index}" name="nominal[]" placeholder="0" autocomplete="off" required>
                </div>
            </div>
        `);

    // Update status tombol "Hapus" setelah menambah baris
    updateRemoveButtonState('insert');
  });

  // Menghapus baris terakhir
  $('body').on('click', '.remove_node_btn_frm_field_insert', function () {
    var totalRows = $('.form_add_elements_insert').find('.form_add_elements_row_insert').length;

    if (totalRows > 1) {
      $('.form_add_elements_insert').find('.form_add_elements_row_insert').last().remove();
    }

    // Update status tombol "Hapus" setelah menghapus baris
    updateRemoveButtonState('insert');
  });

  // Set initial state of the remove button
  updateRemoveButtonState('insert');

  // Modal Edit
  // Menambah baris baru
  $('body').on('click', '.add_new_frm_field_btn_edit', function () {
    var index = $('.form_add_elements_edit').find('.form_add_elements_row_edit').length + 1;

    $('.form_add_elements_edit').find('.form_add_elements_row_edit:last').after(`
            <div class="mb-3 row g-3 form_add_elements_row_edit">
                <!-- Jadwal Bayar -->
                <div class="form-row col-sm-6">
                    <label for="jadwal_bayar_${index}">Jadwal Bayar <span class="text-danger">*</span></label>
                    <input class="form-control" type="date" id="jadwal_bayar_${index}" name="jadwal_bayar[]" required>
                </div>

                <!-- Nominal -->
                <div class="form-row col-sm-6">
                    <label for="nominal_${index}">Nominal <span class="text-danger">*</span></label>
                    <input class="form-control nominal" type="text" id="nominal_${index}" name="nominal[]" placeholder="0" autocomplete="off" required>
                </div>
            </div>
        `);

    // Update status tombol "Hapus" setelah menambah baris
    updateRemoveButtonState('edit');
  });

  // Menghapus baris terakhir
  $('body').on('click', '.remove_node_btn_frm_field_edit', function () {
    var totalRows = $('.form_add_elements_edit').find('.form_add_elements_row_edit').length;

    if (totalRows > 1) {
      $('.form_add_elements_edit').find('.form_add_elements_row_edit').last().remove();
    }

    // Update status tombol "Hapus" setelah menghapus baris
    updateRemoveButtonState('edit');
  });

  // Set initial state of the remove button
  updateRemoveButtonState('edit');
});
