/**
 * Remove All Duplicate IDs - Script agresif untuk menghilangkan semua ID duplikat
 */

$(document).ready(function() {
    // Jalankan beberapa kali untuk memastikan semua ID duplikat tertangani
    setTimeout(function() {
        removeAllDuplicateIds();
    }, 100);
    
    setTimeout(function() {
        removeAllDuplicateIds();
    }, 500);
    
    setTimeout(function() {
        removeAllDuplicateIds();
    }, 1000);
});

function removeAllDuplicateIds() {
    const seenIds = new Set();
    const elementsToFix = [];
    
    // Kumpulkan semua elemen dengan ID
    document.querySelectorAll('[id]').forEach(function(element) {
        const id = element.id;
        
        // Skip ID yang kosong atau tidak valid
        if (!id || id.trim() === '' || id.includes('"') || id.includes("'")) {
            return;
        }
        
        if (seenIds.has(id)) {
            // ID duplikat ditemukan
            elementsToFix.push(element);
        } else {
            seenIds.add(id);
        }
    });
    
    // Perbaiki elemen dengan ID duplikat
    elementsToFix.forEach(function(element, index) {
        const originalId = element.id;
        const newId = originalId + '_dup_' + (index + 1) + '_' + Date.now();
        
        try {
            element.id = newId;
            console.log(`Fixed duplicate ID: ${originalId} -> ${newId}`);
        } catch (error) {
            console.warn(`Failed to fix ID ${originalId}:`, error);
        }
    });
    
    if (elementsToFix.length > 0) {
        console.log(`Fixed ${elementsToFix.length} duplicate IDs`);
    }
}

// Fungsi untuk memvalidasi tidak ada ID duplikat
function validateUniqueIds() {
    const ids = [];
    const duplicates = [];
    
    document.querySelectorAll('[id]').forEach(function(element) {
        const id = element.id;
        if (id && id.trim() !== '') {
            if (ids.includes(id)) {
                if (!duplicates.includes(id)) {
                    duplicates.push(id);
                }
            } else {
                ids.push(id);
            }
        }
    });
    
    if (duplicates.length === 0) {
        console.log('✅ All IDs are unique!');
        return true;
    } else {
        console.error('❌ Duplicate IDs found:', duplicates);
        return false;
    }
}

// Export fungsi untuk debugging
window.removeAllDuplicateIds = removeAllDuplicateIds;
window.validateUniqueIds = validateUniqueIds;