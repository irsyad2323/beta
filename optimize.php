<?php
// Optimasi untuk mempercepat loading
function minifyHTML($html) {
    // Hapus komentar HTML
    $html = preg_replace('/<!--(.|\s)*?-->/', '', $html);
    // Hapus whitespace berlebih
    $html = preg_replace('/\s+/', ' ', $html);
    // Hapus whitespace di awal dan akhir tag
    $html = preg_replace('/>\s+</', '><', $html);
    return trim($html);
}

// Start output buffering
ob_start();
?>