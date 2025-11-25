<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SOAL 1</title>
</head>
<body>
    <h2>Kalkulator Saldo Bank</h2>
    <form method="POST">
        <label>Saldo Awal (Rp):</label>
        <input type="number" name="saldo_awal" value="1000000" required>
        <br><br>
        
        <label>Jumlah Bulan (N):</label>
        <input type="number" name="jumlah_bulan" value="12" required>
        <br><br>
        
        <button type="submit">Hitung Saldo Akhir</button>
    </form>
    <hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data dari form
        $saldo_awal = floatval($_POST['saldo_awal']);
        $jumlah_bulan = intval($_POST['jumlah_bulan']);
        $biaya_admin = 9000; // Tetapkan biaya admin Rp 9.000
        
        // Inisialisasi saldo
        $saldo = $saldo_awal;
        
        echo "<p><strong>Saldo Awal:</strong> Rp " . number_format($saldo, 0, ',', '.') . "</p>";
        
        // Hitung untuk setiap bulan
        for ($bulan = 1; $bulan <= $jumlah_bulan; $bulan++) {
            // Tentukan bunga berdasarkan saldo
            if ($saldo < 1100000) {
                $bunga_persen = 3;
            } else {
                $bunga_persen = 4;
            }
            
            // Hitung bunga (per tahun, dibagi 12 untuk per bulan)
            $bunga = $saldo * ($bunga_persen / 100) / 12;
            
            // Tambahkan bunga
            $saldo += $bunga;
            
            // Kurangi biaya admin
            $saldo -= $biaya_admin;
            
            
        }
        
        echo "<hr>";
        echo "<h3>SALDO AKHIR setelah $jumlah_bulan bulan: Rp " . number_format($saldo, 0, ',', '.') . "</h3>";
    }
    ?>
</body>
</html>