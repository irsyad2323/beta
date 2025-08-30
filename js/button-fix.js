$(document).ready(function() {
    // Pastikan event handlers terpasang setelah DOM ready
    
    // Re-attach event handlers untuk tombol yang mungkin tidak responsif
    $(document).off('click', '.add, .list_sign, .list_pros, .list_solved, .addts');
    
    // Event handler untuk tombol hijau (add)
    $(document).on('click', '.add', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        var tanggal = $(this).attr('tanggal');
        var start = $(this).attr('start');
        var end = $(this).attr('end');
        
        if (tanggal && start && end) {
            $("#modal_post_wo").modal("show");
            var modal = $("#modal_post_wo");
            modal.find(".date_wo").val(tanggal);
            modal.find(".start").val(start);
            modal.find(".end").val(end);
        }
    });
    
    // Event handler untuk tombol kuning (list_sign)
    $(document).on('click', '.list_sign', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        var date_wo = $(this).attr("tanggal");
        var start = $(this).attr("start");
        var end = $(this).attr("end");
        
        $("#date_wo_ts").val(date_wo);
        $("#start").val(start);
        
        if (start == "06:00:00") {
            $("#modal_sign1").modal("show");
        } else if (start == "08:00:00") {
            $("#modal_sign2").modal("show");
        } else if (start == "10:00:00") {
            $("#modal_sign3").modal("show");
        } else if (start == "13:00:00") {
            $("#modal_sign4").modal("show");
        } else if (start == "15:00:00") {
            $("#modal_sign5").modal("show");
        } else if (start == "18:00:00") {
            $("#modal_sign6").modal("show");
        }
    });
    
    // Event handler untuk tombol merah (list_pros)
    $(document).on('click', '.list_pros', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        var date_wo = $(this).attr("tanggal");
        var start = $(this).attr("start");
        var end = $(this).attr("end");
        
        $("#date_wo_ts").val(date_wo);
        $("#start").val(start);
        
        if (start == "06:00:00") {
            $("#modal_pros1").modal("show");
        } else if (start == "08:00:00") {
            $("#modal_pros2").modal("show");
        } else if (start == "10:00:00") {
            $("#modal_pros3").modal("show");
        } else if (start == "13:00:00") {
            $("#modal_pros4").modal("show");
        } else if (start == "15:00:00") {
            $("#modal_pros5").modal("show");
        } else if (start == "18:00:00") {
            $("#modal_pros6").modal("show");
        }
    });
    
    // Event handler untuk tombol biru (list_solved)
    $(document).on('click', '.list_solved', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        var date_wo = $(this).attr("tanggal");
        var start = $(this).attr("start");
        var end = $(this).attr("end");
        
        $("#date_wo_ts").val(date_wo);
        $("#start").val(start);
        
        if (start == "06:00:00") {
            $("#modal_solv1").modal("show");
        } else if (start == "08:00:00") {
            $("#modal_solv2").modal("show");
        } else if (start == "10:00:00") {
            $("#modal_solv3").modal("show");
        } else if (start == "13:00:00") {
            $("#modal_solv4").modal("show");
        } else if (start == "15:00:00") {
            $("#modal_solv5").modal("show");
        } else if (start == "18:00:00") {
            $("#modal_solv6").modal("show");
        }
    });
    
    // Event handler untuk tombol addts (untuk IKR)
    $(document).on('click', '.addts', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        var date_wo = $(this).attr("tes");
        var start = $(this).attr("start2");
        var end = $(this).attr("end");
        
        $("#date_wo_ts").val(date_wo);
        $("#start").val(start);
        
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
    
    // Debug function untuk memeriksa tombol
    window.debugButtons = function() {
        console.log('Total buttons with classes:', $('.add, .list_sign, .list_pros, .list_solved, .addts').length);
        $('.add, .list_sign, .list_pros, .list_solved, .addts').each(function(i, el) {
            console.log('Button', i, ':', $(el).attr('class'), 'Attributes:', el.attributes);
        });
    };
});