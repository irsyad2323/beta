// Fast loading untuk datatable modals
const datatableModals = [
    'modal_datatable_sign.php',
    'modal_datatable_sign_pas.php', 
    'modal_datatable_proses.php',
    'modal_datatable_proses_pas.php',
    'modal_datatable_solved.php'
];

// Load semua datatable modals sekaligus dengan Promise.all
$(document).ready(function() {
    const promises = datatableModals.map(file => 
        fetch(file).then(response => response.text())
    );
    
    Promise.all(promises)
        .then(htmlArray => {
            document.getElementById('datatable-modals').innerHTML = htmlArray.join('');
            
            // Re-bind event handlers untuk action buttons
            setTimeout(() => {
                // Trigger event untuk memastikan semua script terikat
                $(document).trigger('DOMNodeInserted');
                
                // Inisialisasi DataTable jika ada
                $('.table').each(function() {
                    if (!$.fn.DataTable.isDataTable(this)) {
                        $(this).DataTable();
                    }
                });
            }, 100);
        })
        .catch(error => console.error('Error loading datatable modals:', error));
});