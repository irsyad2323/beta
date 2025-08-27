// Lazy modal untuk modal selain datatable
const modalFiles = {
    'modal_slot': 'modal_slot.php',
    'modal_add_ikr': 'modal_add_ikr.php',
    'modal_add_mntn': 'modal_add_mntn.php',
    'modal_add_mntnodp': 'modal_add_mntnodp.php',
    'modal_add_dis': 'modal_add_dis.php',
    'modal_add_cor': 'modal_add_cor.php',
    'modal_solved_ikr': 'modal_solved_ikr.php',
    'modal_solved': 'modal_solved.php',
    'modalmntn': 'modal_solved_mntn.php',
    'modal_solved_ins_odp': 'modal_solved_ins_odp.php',
    'modal_solved_ins_distribusi': 'modal_solved_ins_distribusi.php',
    'modal_solved_ins_backbone': 'modal_solved_ins_backbone.php',
    'modal_form_list': 'modal_form_list.php',
    'modal_slot_jdwl': 'modal_slot_jdwl.php'
};

const loadedModals = new Set();

function loadModal(modalId) {
    const file = modalFiles[modalId];
    if (file && !loadedModals.has(modalId)) {
        fetch(file)
            .then(response => response.text())
            .then(html => {
                document.getElementById('modal-container').innerHTML += html;
                loadedModals.add(modalId);
                
                // Initialize select2 if available
                setTimeout(() => {
                    const modal = document.getElementById(modalId);
                    if (modal && typeof $.fn.select2 !== 'undefined') {
                        $(modal).find('.select2').select2();
                    }
                }, 100);
            })
            .catch(error => console.error('Error loading modal:', error));
    }
}

// Override Bootstrap modal show
$(document).ready(function() {
    const originalModal = $.fn.modal;
    $.fn.modal = function(action) {
        if (action === 'show') {
            const modalId = this.attr('id');
            if (modalFiles[modalId]) {
                loadModal(modalId);
                setTimeout(() => {
                    originalModal.call(this, action);
                }, 150);
                return this;
            }
        }
        return originalModal.call(this, action);
    };
});