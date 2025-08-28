// Lazy Modal Loading - Load modals only when needed
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
            // Append modal to body if not exists
            if (!document.getElementById(modalId)) {
                document.body.insertAdjacentHTML('beforeend', html);
            }
            loadedModals.add(modalId);
        })
        .catch(error => {
            console.error('Error loading modal:', error);
        });
}

// Override modal show to load content first
const originalModal = $.fn.modal;
$.fn.modal = function(action) {
    if (action === 'show') {
        const modalId = this.attr('id');
        if (modalMap[modalId]) {
            loadModal(modalId).then(() => {
                originalModal.call(this, action);
            });
            return this;
        }
    }
    return originalModal.call(this, action);
};