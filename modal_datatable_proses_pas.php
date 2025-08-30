<!-- Modal Proses PAS -->
<div class="modal fade" id="modal_proses_pas" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Proses Pengerjaan - PAS (SBM)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Filter Slot Waktu -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Pilih Slot Waktu:</label>
                        <select class="form-control" id="time_slot_filter">
                            <option value="06:00:00-07:59:59">Slot 1 (06:00 - 07:59)</option>
                            <option value="08:00:00-09:59:59">Slot 2 (08:00 - 09:59)</option>
                            <option value="10:00:00-12:59:59">Slot 3 (10:00 - 12:59)</option>
                            <option value="13:00:00-14:59:59">Slot 4 (13:00 - 14:59)</option>
                            <option value="15:00:00-17:59:59">Slot 5 (15:00 - 17:59)</option>
                            <option value="18:00:00-19:59:59">Slot 6 (18:00 - 19:59)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Tanggal:</label>
                        <input type="date" class="form-control" id="tanggal_filter" value="<?= date('Y-m-d') ?>">
                    </div>
                </div>
                
                <!-- Container untuk data -->
                <div id="data_container_pas">
                    <div class="text-center">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <p>Memuat data...</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Load data saat modal dibuka
    $('#modal_proses_pas').on('shown.bs.modal', function() {
        loadProsesPasData();
    });
    
    // Load data saat filter berubah
    $('#time_slot_filter, #tanggal_filter').on('change', function() {
        loadProsesPasData();
    });
    
    function loadProsesPasData() {
        var timeSlot = $('#time_slot_filter').val();
        var tanggal = $('#tanggal_filter').val();
        
        $('#data_container_pas').html(`
            <div class="text-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <p>Memuat data...</p>
            </div>
        `);
        
        $.ajax({
            url: 'ajax/load_proses_pas_data.php',
            type: 'POST',
            data: {
                time_slot: timeSlot,
                tanggal: tanggal
            },
            success: function(response) {
                $('#data_container_pas').html(response);
            },
            error: function() {
                $('#data_container_pas').html(`
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle"></i>
                        Gagal memuat data. Silakan coba lagi.
                    </div>
                `);
            }
        });
    }
});
</script>