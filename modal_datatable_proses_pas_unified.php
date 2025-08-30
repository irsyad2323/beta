<div class="modal fade" id="modal_proses_pas_unified" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-user">List Working Proses Pasuruan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Pilih Slot Waktu:</label>
                    <select class="form-control" id="proses_pas_time_slot_filter">
                        <option value="06:00:00-07:59:59">06:00 - 07:59</option>
                        <option value="08:00:00-09:59:59">08:00 - 09:59</option>
                        <option value="10:00:00-12:59:59">10:00 - 12:59</option>
                        <option value="13:00:00-14:59:59">13:00 - 14:59</option>
                        <option value="15:00:00-17:59:59">15:00 - 17:59</option>
                        <option value="18:00:00-19:59:59">18:00 - 19:59</option>
                    </select>
                </div>
                <div id="proses_pas_data_container">
                    <!-- Data akan dimuat via AJAX -->
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
    $('#proses_pas_time_slot_filter').change(function() {
        var selectedDate = $('#date_wo_ts').val() || '<?= date("Y-m-d") ?>';
        loadProsesPasTimeSlotData($(this).val(), selectedDate);
    });
    
    // Tidak auto-load, hanya load ketika slot dipilih
});

function loadProsesPasTimeSlotData(timeSlot, tanggal) {
    $('#proses_pas_data_container').html('<div class="text-center"><i class="fa fa-spinner fa-spin"></i> Loading...</div>');
    
    // Gunakan tanggal yang dikirim atau tanggal hari ini
    var selectedDate = tanggal || $('#date_wo_ts').val() || '<?= date("Y-m-d") ?>';
    
    $.ajax({
        url: 'ajax/load_proses_pas_data.php',
        method: 'POST',
        data: { 
            time_slot: timeSlot,
            tanggal: selectedDate
        },
        success: function(response) {
            $('#proses_pas_data_container').html(response);
        },
        error: function(xhr, status, error) {
            console.log('Error:', error);
            console.log('Response:', xhr.responseText);
            $('#proses_pas_data_container').html('<div class="alert alert-danger">Error loading data: ' + error + '</div>');
        }
    });
}
</script>