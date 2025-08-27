/**
 * Fix Duplicate IDs - Mengatasi masalah ID duplikat di DOM
 * Menambahkan suffix unik untuk setiap elemen dengan ID yang sama
 */

$(document).ready(function() {
    // Daftar ID yang sering duplikat
    const duplicateIds = [
        'date_wo',
        'date_wo_ts', 
        'form_edit_sinden',
        'formdatapengguna',
        'id_odp',
        'kabupaten',
        'kd_layanan',
        'kecamatan',
        'kelurahan',
        'key_fal',
        'latitude',
        'longitude',
        'provinsi',
        'tanggal'
    ];
    
    // Delay untuk memastikan semua elemen sudah dimuat
    setTimeout(function() {
        fixDuplicateIds();
        
        // Observer untuk elemen yang ditambahkan secara dinamis
        const observer = new MutationObserver(function(mutations) {
            let needsFix = false;
            mutations.forEach(function(mutation) {
                if (mutation.type === 'childList') {
                    mutation.addedNodes.forEach(function(node) {
                        if (node.nodeType === 1 && node.id) {
                            needsFix = true;
                        }
                    });
                }
            });
            
            if (needsFix) {
                setTimeout(fixDuplicateIds, 100);
            }
        });
        
        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
    }, 500);

    // Fungsi untuk memperbaiki ID duplikat
    function fixDuplicateIds() {
        // Cari semua elemen dengan ID
        const allElements = document.querySelectorAll('[id]');
        const idCounts = {};
        const duplicateElements = {};
        
        // Hitung kemunculan setiap ID (filter ID yang valid)
        allElements.forEach(function(element) {
            const id = element.id;
            // Skip ID yang kosong atau mengandung karakter khusus yang bermasalah
            if (!id || id.includes('"') || id.includes('\'') || id.trim() === '') {
                return;
            }
            
            if (!idCounts[id]) {
                idCounts[id] = 0;
                duplicateElements[id] = [];
            }
            idCounts[id]++;
            duplicateElements[id].push(element);
        });
        
        // Perbaiki ID yang duplikat
        Object.keys(idCounts).forEach(function(id) {
            if (idCounts[id] > 1) {
                console.warn(`Found ${idCounts[id]} elements with duplicate ID: ${id}`);
                
                duplicateElements[id].forEach(function(element, index) {
                    if (index > 0) { // Biarkan elemen pertama tetap dengan ID asli
                        const newId = id + '_' + index;
                        element.id = newId;
                        
                        // Update label yang menggunakan for attribute (dengan escape karakter khusus)
                        try {
                            const escapedId = CSS.escape(id);
                            const labels = document.querySelectorAll(`label[for="${escapedId}"]`);
                            if (labels.length > index) {
                                labels[index].setAttribute('for', newId);
                            }
                            
                            // Update aria-labelledby references
                            const ariaElements = document.querySelectorAll(`[aria-labelledby="${escapedId}"]`);
                            ariaElements.forEach(function(ariaElement) {
                                ariaElement.setAttribute('aria-labelledby', newId);
                            });
                        } catch (e) {
                            console.warn(`Skipping selector update for invalid ID: ${id}`);
                        }
                        
                        console.log(`Changed duplicate ID from '${id}' to '${newId}'`);
                    }
                });
            }
        });
    }

    // Fungsi akan dipanggil dari setTimeout di atas

    // Perbaiki masalah aria-hidden pada modal
    $('.modal').on('show.bs.modal', function() {
        $(this).removeAttr('aria-hidden');
    });

    $('.modal').on('hidden.bs.modal', function() {
        $(this).attr('aria-hidden', 'true');
    });

    // Perbaiki masalah focus pada modal
    $('.modal').on('shown.bs.modal', function() {
        $(this).find('[autofocus]').focus();
    });

    console.log('Duplicate IDs fixed successfully');
});

/**
 * Fungsi untuk menambahkan ID unik pada elemen baru yang ditambahkan secara dinamis
 */
function addUniqueId(element, baseId) {
    const existingElements = document.querySelectorAll(`[id^="${baseId}"]`);
    const newId = baseId + '_' + existingElements.length;
    element.id = newId;
    return newId;
}

/**
 * Fungsi untuk memvalidasi tidak ada ID duplikat
 */
function validateNoDuplicateIds() {
    const allIds = [];
    const duplicates = [];
    
    document.querySelectorAll('[id]').forEach(function(element) {
        const id = element.id;
        if (allIds.includes(id)) {
            if (!duplicates.includes(id)) {
                duplicates.push(id);
            }
        } else {
            allIds.push(id);
        }
    });
    
    if (duplicates.length > 0) {
        console.error('Duplicate IDs found:', duplicates);
        return false;
    }
    
    console.log('No duplicate IDs found');
    return true;
}