$(document).on("click", ".addts", function () {
    var date_wo = $(this).attr("tes");
    var start = $(this).attr("start2");
    var end = $(this).attr("end");
    
    $("#date_wo_ts").val(date_wo);
    $("#start").val(start);
    
    // Set time slot untuk modal proses pas
    var timeSlot = start + '-' + end;
    $("#time_slot_filter").val(timeSlot);
    $("#tanggal_filter").val(date_wo);
    
    if (start == "06:00:00") {
        $("#modal_1").modal("show");
    } else if (start == "08:00:00") {
        $("#modal_2").modal("show");
    } else if (start == "10:00:00") {
        $("#modal_3").modal("show");
    } else if (start == "13:00:00") {
        $("#modal_4").modal("show");
    } else if (start == "15:00:00") {
        $("#modal_5").modal("show");
    } else if (start == "18:00:00") {
        $("#modal_6").modal("show");
    }
});

// Handler untuk modal proses pas
$(document).on("click", ".addts_proses_pas", function () {
    var date_wo = $(this).attr("tes");
    var start = $(this).attr("start2");
    var end = $(this).attr("end");
    var timeSlot = start + '-' + end;
    
    $("#time_slot_filter").val(timeSlot);
    $("#tanggal_filter").val(date_wo);
    $("#modal_proses_pas").modal("show");
});