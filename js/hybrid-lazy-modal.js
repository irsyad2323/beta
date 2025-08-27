// Hybrid lazy modal - cepat + button berfungsi
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
            });
    }, 100);
    
    // Fix untuk modal nested - override Bootstrap modal
    let modalStack = [];
    
    $(document).on('show.bs.modal', '.modal', function() {
        const modal = $(this);
        const modalId = modal.attr('id');
        
        // Tambah ke stack
        modalStack.push(modalId);
        
        // Set z-index berdasarkan posisi di stack
        const zIndex = 1050 + (modalStack.length * 10);
        modal.css('z-index', zIndex);
        
        // Fix backdrop z-index
        setTimeout(() => {
            $('.modal-backdrop:last').css('z-index', zIndex - 1);
        }, 0);
    });
    
    $(document).on('hidden.bs.modal', '.modal', function() {
        const modalId = $(this).attr('id');
        
        // Hapus dari stack
        const index = modalStack.indexOf(modalId);
        if (index > -1) {
            modalStack.splice(index, 1);
        }
        
        // Jaga body modal-open jika masih ada modal
        if (modalStack.length > 0) {
            setTimeout(() => {
                $('body').addClass('modal-open');
            }, 0);
        }
    });
});