$(document).ready(function () {
  // Inisialisasi DataTables dan simpan dalam variabel `table`
  var table = $('#tabel_partner_head').DataTable({
    processing: true,
    responsive: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    ajax: {
      url: '../../models/business_solutions.php',
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
      { data: 'nama_instansi' },
      { data: 'alamat_instansi' },
      { data: 'kelurahan' },
      { data: 'contact_person' },
      { data: 'telepon' },
      { data: 'jabatan' },
      {
        data: 'kd_layanan',
        render: function (data) {
          const valueMap = {
            mlg: 'NARATEL',
            SBM: 'SBM',
            batu: 'JLB',
            mlg1: 'JTI',
          };
          const displayText = valueMap[data] || data || '-';
          return `<small class="badge badge-primary text-uppercase">${displayText}</small>`;
        },
      },
      { data: 'created_at' },
      {
        data: null,
        render: function (data) {
          return `
            <a key_fal="${data.key_fal}"
               nama_instansi="${data.nama_instansi}"
               alamat_instansi="${data.alamat_instansi}"
               kelurahan="${data.kelurahan}"
               contact_person="${data.contact_person}"
               telepon="${data.telepon}"
               jabatan="${data.jabatan}"
               kd_layanan="${data.kd_layanan}" 
               class="btn btn-warning editPermit"><i class="fas fa-pencil-alt"></i>
            </a>
          `;
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

  // Handler untuk tombol "Tambah Permit"
  $('.tambahPartnerHead').on('click', () => $('#modalTambahPartnerHead').modal('show'));

  // READ - Ambil data business solutions berdasarkan key_fal
  $(document).on('click', '.editPermit', function () {
    var attributes = ['key_fal', 'nama_instansi', 'alamat_instansi', 'kelurahan', 'contact_person', 'telepon', 'jabatan', 'kd_layanan'];

    attributes.forEach(function (attr) {
      $('#' + attr + '1').val($(this).attr(attr));
    }, this);

    $('#modalEditPartnerHead').modal('show');
  });

  // INSERT
  $('#addPartnerHeadForm').submit(function (e) {
    e.preventDefault();

    // Mengambil data dari form
    const formData = new FormData(this);

    // Mengirim data ke backend menggunakan AJAX
    $.ajax({
      url: '../../controller/action_insert_business_solutions.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        Swal.fire('Alhamdulillah', 'Data business solutions berhasil ditambah.', 'success').then(function (success) {
          window.location.reload(true);
        });
      },
      error: function (jqXHR) {
        alert(jqXHR);
      },
    });
  });

  // UPDATE - Simpan data business solutions baru
  $('#updatePartnerHeadForm').on('submit', function (e) {
    e.preventDefault();

    var fd = new FormData();
    var key_fal = $('#key_fal1').val();
    var permit_status_id = $('#permit_status_id1').val();
    var nama_instansi = $('#nama_instansi1').val();
    var alamat_instansi = $('#alamat_instansi1').val();
    var kelurahan = $('#kelurahan1').val();
    var contact_person = $('#contact_person1').val();
    var telepon = $('#telepon1').val();
    var jabatan = $('#jabatan1').val();
    var kd_layanan = $('#kd_layanan1').val();

    fd.append('key_fal', key_fal);
    fd.append('permit_status_id', permit_status_id);
    fd.append('nama_instansi', nama_instansi);
    fd.append('alamat_instansi', alamat_instansi);
    fd.append('kelurahan', kelurahan);
    fd.append('contact_person', contact_person);
    fd.append('telepon', telepon);
    fd.append('jabatan', jabatan);
    fd.append('kd_layanan', kd_layanan);

    $.ajax({
      type: 'POST',
      url: '../../controller/action_edit_business_solutions.php',
      data: fd,
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

  // Event delegation untuk klik pada link kwitansi
  $(document).on('click', '.view-kwitansi', function (e) {
    e.preventDefault();
    const imageSrc = $(this).data('src');
    $('#modalImage').attr('src', imageSrc);
    $('#viewDokumentasiModal').modal('show');
  });
});
