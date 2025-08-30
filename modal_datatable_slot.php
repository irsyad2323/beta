<!-- Modal Slot Unified -->
<div class="modal fade" id="modal_slot_unified" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Slot Waktu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input class="form-control date_wo" type="hidden" name="date_wo">
                <input class="form-control start" type="hidden" name="start">
                <input class="form-control end" type="hidden" name="end">
                
                <!-- Debug info -->
                <div class="alert alert-info">
                    <strong>Debug:</strong> 
                    Tanggal: <span id="debug_date">-</span> | 
                    Start: <span id="debug_start">-</span> | 
                    End: <span id="debug_end">-</span> | 
                    TimeSlot: <span id="debug_timeslot">-</span>
                </div>
                
                <!-- Container untuk data -->
                <div id="data_container_slot">
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
    $('#modal_slot_unified').on('shown.bs.modal', function() {
        // Delay untuk memastikan nilai sudah di-set
        setTimeout(function() {
            var modal = $('#modal_slot_unified');
            var start = modal.find('.start').val();
            var end = modal.find('.end').val();
            var date_wo = modal.find('.date_wo').val();
            
            // Debug info
            $('#debug_date').text(date_wo || 'KOSONG');
            $('#debug_start').text(start || 'KOSONG');
            $('#debug_end').text(end || 'KOSONG');
            
            console.log('Modal values:', {date_wo, start, end});
            
            if (start && end && date_wo) {
                var timeSlot = start + '-' + end;
                $('#debug_timeslot').text(timeSlot);
                loadSlotData(timeSlot, date_wo);
            } else {
                $('#debug_timeslot').text('DATA TIDAK LENGKAP');
                $('#data_container_slot').html('<div class="alert alert-warning">Data slot tidak lengkap. Start: ' + start + ', End: ' + end + ', Date: ' + date_wo + '</div>');
            }
        }, 100);
    });
    
    function loadSlotData(timeSlot, tanggal) {
        if (!timeSlot || !tanggal) return;
        
        $('#data_container_slot').html(`
            <div class="text-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <p>Memuat data...</p>
            </div>
        `);
        
        $.ajax({
            url: 'ajax/load_time_slot_data.php',
            type: 'POST',
            data: {
                time_slot: timeSlot,
                tanggal: tanggal
            },
            success: function(response) {
                $('#data_container_slot').html(response);
            },
            error: function() {
                $('#data_container_slot').html(`
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