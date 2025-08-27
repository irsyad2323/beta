/**
 * Final ID Fix - Solusi terakhir untuk ID duplikat
 */

// Jalankan segera setelah DOM loaded
document.addEventListener('DOMContentLoaded', function() {
    finalIdFix();
});

// Jalankan juga dengan jQuery ready
$(document).ready(function() {
    setTimeout(finalIdFix, 50);
    setTimeout(finalIdFix, 200);
    setTimeout(finalIdFix, 500);
});

function finalIdFix() {
    // Hapus semua ID duplikat dengan cara yang sangat agresif
    const idMap = new Map();
    let fixCount = 0;
    
    // Kumpulkan semua elemen dengan ID
    document.querySelectorAll('[id]').forEach(function(element) {
        const id = element.id;
        
        // Skip jika ID kosong atau tidak valid
        if (!id || id.trim() === '') return;
        
        if (idMap.has(id)) {
            // ID duplikat - hapus ID dari elemen ini
            element.removeAttribute('id');
            fixCount++;
            console.log(`Removed duplicate ID: ${id}`);
        } else {
            idMap.set(id, element);
        }
    });
    
    if (fixCount > 0) {
        console.log(`Final ID Fix: Removed ${fixCount} duplicate IDs`);
    }
}

// Export untuk debugging
window.finalIdFix = finalIdFix;