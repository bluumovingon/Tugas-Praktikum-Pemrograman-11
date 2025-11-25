<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SOAL 2</title>
</head>
<body>
    <h2>Pencari Kombinasi x + y + z = 25</h2>
    <p>Program ini mencari semua kombinasi bilangan asli x, y, dan z yang memenuhi persamaan x + y + z = 25</p>
    <hr>

    <?php
    // Inisialisasi variabel
    $target = 25;
    $kombinasi = array();
    $jumlah = 0;
    
    // Menggunakan nested FOR 3 tingkat
    for ($x = 1; $x <= $target - 2; $x++) {
        for ($y = 1; $y <= $target - $x - 1; $y++) {
            for ($z = 1; $z <= $target - $x - $y; $z++) {
                // Cek apakah memenuhi persamaan
                if ($x + $y + $z == $target) {
                    $kombinasi[] = array('x' => $x, 'y' => $y, 'z' => $z);
                    $jumlah++;
                }
            }
        }
    }
    
    // Tampilkan hasil
    echo "<h3>Hasil Pencarian:</h3>";
    echo "<p><strong>Persamaan:</strong> x + y + z = $target</p>";
    echo "<p><strong>Syarat:</strong> x, y, dan z adalah bilangan asli (bilangan bulat positif)</p>";
    echo "<hr>";
    
    echo "<h3>Semua Kombinasi yang Memenuhi:</h3>";
    foreach ($kombinasi as $index => $nilai) {
        $no = $index + 1;
        echo "<p>$no. x = {$nilai['x']}, y = {$nilai['y']}, z = {$nilai['z']}</p>";
    }
    
    echo "<hr>";
    echo "<h3>Statistik:</h3>";
    echo "<p><strong>Jumlah penyelesaian: $jumlah kombinasi</strong></p>";
    
    // Cari nilai minimum dan maksimum
    if ($jumlah > 0) {
        $x_values = array_column($kombinasi, 'x');
        $y_values = array_column($kombinasi, 'y');
        $z_values = array_column($kombinasi, 'z');
        
        echo "<p><strong>Nilai minimum:</strong></p>";
        echo "<ul>";
        echo "<li>x minimum: " . min($x_values) . "</li>";
        echo "<li>y minimum: " . min($y_values) . "</li>";
        echo "<li>z minimum: " . min($z_values) . "</li>";
        echo "</ul>";
        
        echo "<p><strong>Nilai maksimum:</strong></p>";
        echo "<ul>";
        echo "<li>x maksimum: " . max($x_values) . "</li>";
        echo "<li>y maksimum: " . max($y_values) . "</li>";
        echo "<li>z maksimum: " . max($z_values) . "</li>";
        echo "</ul>";
    }
    ?>
</body>
</html>