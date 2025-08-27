// Load all modals on page ready
$(document).ready(function() {
    const modals = [
        'modal_datatable_sign.php',
        'modal_datatable_sign_pas.php',
        'modal_datatable_proses.php', 
        'modal_datatable_proses_pas.php',
        'modal_datatable_solved.php',
        'modal_solved_ikr.php',
        'modal_solved_mntn.php'
    ];
    
    // Load all modals quickly
    Promise.all(modals.map(file => fetch(file).then(r => r.text())))
        .then(htmlArray => {
            $('#modal-container').html(htmlArray.join(''));
        });
});