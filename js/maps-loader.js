/**
 * Google Maps API Loader - Menangani loading Google Maps dengan benar
 */

// Fungsi untuk memuat Google Maps API secara async
function loadGoogleMapsAPI() {
    return new Promise((resolve, reject) => {
        // Cek apakah Google Maps sudah dimuat
        if (window.google && window.google.maps) {
            resolve();
            return;
        }

        // Buat script element
        const script = document.createElement('script');
        script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCF0F_M6IBOlzYMqrHQXiSBbnvv8npHafs&libraries=places&loading=async';
        script.async = true;
        script.defer = true;
        
        script.onload = () => {
            // Tunggu sampai Google Maps benar-benar siap
            const checkGoogleMaps = () => {
                if (window.google && window.google.maps && window.google.maps.Map) {
                    resolve();
                } else {
                    setTimeout(checkGoogleMaps, 100);
                }
            };
            checkGoogleMaps();
        };
        
        script.onerror = () => {
            reject(new Error('Failed to load Google Maps API'));
        };
        
        document.head.appendChild(script);
    });
}

// Inisialisasi Google Maps setelah API dimuat
async function initializeGoogleMaps() {
    try {
        await loadGoogleMapsAPI();
        
        // Panggil initMap jika tersedia
        if (typeof window.initMap === 'function') {
            window.initMap();
        }
        
        console.log('Google Maps API loaded successfully');
    } catch (error) {
        console.error('Error loading Google Maps API:', error);
    }
}

// Jalankan setelah DOM ready
$(document).ready(function() {
    // Hapus script Google Maps yang lama jika ada
    const existingScript = document.querySelector('script[src*="maps.googleapis.com"]');
    if (existingScript) {
        existingScript.remove();
    }
    
    // Load Google Maps API
    initializeGoogleMaps();
});

// Fungsi untuk menangani error Google Maps
window.gm_authFailure = function() {
    console.error('Google Maps API authentication failed');
    alert('Google Maps API authentication failed. Please check your API key.');
};