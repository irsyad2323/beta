// Smart lazy modal dengan fix duplikat dan z-index
$(document).ready(function() {
    const modals = [
        'modal_datatable_sign.php',
        'modal_datatable_sign_pas.php',
        'modal_datatable_proses.php', 
        'modal_datatable_proses_pas.php',
        'modal_datatable_solved.php',
        'modal_slot.php',
        'modal_add_ikr.php',
        'modal_add_mntn.php',
        'modal_add_mntnodp.php',
        'modal_add_dis.php',
        'modal_add_cor.php',
        'modal_solved_ikr.php',
        'modal_solved.php',
        'modal_solved_mntn.php',
        'modal_solved_ins_odp.php',
        'modal_solved_ins_distribusi.php',
        'modal_solved_ins_backbone.php',
        'modal_form_list.php',
        'modal_slot_jdwl.php'
    ];
    
    // Load modals setelah halaman siap
    setTimeout(() => {
        Promise.all(modals.map(file => fetch(file).then(r => r.text())))
            .then(htmlArray => {
                $('#modal-container').html(htmlArray.join(''));
                
                // Fix duplicate IDs dan z-index
                $('.modal').each(function(index) {
                    $(this).css('z-index', 1050 + (index * 10));
                });
                
                // Remove duplicate modals
                const seen = new Set();
                $('.modal').each(function() {
                    const id = $(this).attr('id');
                    if (seen.has(id)) {
                        $(this).remove();
                    } else {
                        seen.add(id);
                    }
                });
                
                // Handle nested modal
                $(document).on('show.bs.modal', '.modal', function() {
                    const zIndex = 1050 + (10 * $('.modal:visible').length);
                    $(this).css('z-index', zIndex);
                    setTimeout(() => {
                        $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
                    }, 0);
                });
                
                $(document).on('hidden.bs.modal', '.modal', function() {
                    if ($('.modal:visible').length > 0) {
                        setTimeout(() => {
                            $(document.body).addClass('modal-open');
                        }, 0);
                    }
                });
            });
    }, 500);
});