// Hybrid Lazy Modal Loading - Load specific modals only when needed
const modalMap = {
    'modal_sign1': 'modal_datatable_sign.php',
    'modal_sign2': 'modal_datatable_sign.php',
    'modal_sign3': 'modal_datatable_sign.php',
    'modal_sign4': 'modal_datatable_sign.php',
    'modal_sign5': 'modal_datatable_sign.php',
    'modal_sign6': 'modal_datatable_sign.php',
    'modal_signp1': 'modal_datatable_sign_pas.php',
    'modal_signp2': 'modal_datatable_sign_pas.php',
    'modal_signp3': 'modal_datatable_sign_pas.php',
    'modal_signp4': 'modal_datatable_sign_pas.php',
    'modal_signp5': 'modal_datatable_sign_pas.php',
    'modal_signp6': 'modal_datatable_sign_pas.php',
    'modal_pros1': 'modal_datatable_proses.php',
    'modal_pros2': 'modal_datatable_proses.php',
    'modal_pros3': 'modal_datatable_proses.php',
    'modal_pros4': 'modal_datatable_proses.php',
    'modal_pros5': 'modal_datatable_proses.php',
    'modal_pros6': 'modal_datatable_proses.php',
    'modal_prosp1': 'modal_datatable_proses_pas.php',
    'modal_prosp2': 'modal_datatable_proses_pas.php',
    'modal_prosp3': 'modal_datatable_proses_pas.php',
    'modal_prosp4': 'modal_datatable_proses_pas.php',
    'modal_prosp5': 'modal_datatable_proses_pas.php',
    'modal_prosp6': 'modal_datatable_proses_pas.php',
    'modal_solv1': 'modal_datatable_solved.php',
    'modal_solv2': 'modal_datatable_solved.php',
    'modal_solv3': 'modal_datatable_solved.php',
    'modal_solv4': 'modal_datatable_solved.php',
    'modal_solv5': 'modal_datatable_solved.php',
    'modal_solv6': 'modal_datatable_solved.php',
    'modal_slot': 'modal_slot.php'
};

const loadedModals = new Set();

function loadModal(modalId) {
    if (loadedModals.has(modalId)) {
        return Promise.resolve();
    }
    
    const phpFile = modalMap[modalId];
    if (!phpFile) {
        return Promise.resolve();
    }
    
    return fetch(phpFile)
        .then(response => response.text())
        .then(html => {
            document.getElementById('modal-container').insertAdjacentHTML('beforeend', html);
            loadedModals.add(modalId);
        })
        .catch(error => {
            console.error('Error loading modal:', error);
        });
}

// Hybrid approach - only intercept specific modals
$(document).on('show.bs.modal', function(e) {
    const modalId = e.target.id;
    if (modalMap[modalId] && !loadedModals.has(modalId)) {
        e.preventDefault();
        loadModal(modalId).then(() => {
            $('#' + modalId).modal('show');
        });
    }
});