// Toggle modal content berdasarkan kategori
function test() {
    var kategori = document.getElementById('kategori').value;
    
    // Hide semua div
    document.getElementById('ikr').style.display = 'none';
    document.getElementById('mntn').style.display = 'none';
    
    // Show div yang dipilih
    if (kategori == 'ikr') {
        document.getElementById('ikr').style.display = 'block';
    } else if (kategori == 'mntn') {
        document.getElementById('mntn').style.display = 'block';
    }
}

// Untuk modal PAS
function testPas() {
    var kategori = document.getElementById('kategori_pas').value;
    
    // Hide semua div
    document.getElementById('ikr_pas').style.display = 'none';
    document.getElementById('mntn_pas').style.display = 'none';
    
    // Show div yang dipilih
    if (kategori == 'ikr_pas') {
        document.getElementById('ikr_pas').style.display = 'block';
    } else if (kategori == 'mntn_pas') {
        document.getElementById('mntn_pas').style.display = 'block';
    }
}