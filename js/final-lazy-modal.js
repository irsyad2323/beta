// Final lazy modal solution
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
    
    // Load modals after page ready
    setTimeout(() => {
        Promise.all(modals.map(file => fetch(file).then(r => r.text())))
            .then(htmlArray => {
                $('#modal-container').html(htmlArray.join(''));
            });
    }, 100);
});