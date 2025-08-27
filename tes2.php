<!DOCTYPE html>
<html>
<head>
    <title>Input Kotak Per Baris</title>
</head>
<body>

<h2>Absensi Teknisi</h2>
<form method="post" action="simpan_kotak.php">
    <label for="tanggal">Tanggal:</label>
    <input type="date" id="tanggal" name="tanggal" required><br>
    <?php for ($i = 1; $i <= 6; $i++): ?>
        Baris <?php echo $i; ?>: <input type="number" name="baris[<?php echo $i; ?>]" min="0" max="10" required><br>
    <?php endfor; ?>
    <input type="submit" value="Submit">
</form>

</body>
</html>
