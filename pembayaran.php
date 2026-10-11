<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="box">
        <p>Jevon Galang Sriatmojo - XII PPLG 2</p>
        <h1>Pos Pembayaran Barang</h1>

        <form action="" method="POST">
            <h4>Nama Barang:</h4>
            <input type="text" name="namaBarang" required>

            <h4>Harga Barang:</h4>
            <input type="number" name="hargaBarang" required>

            <h4>Jumlah Pembelian:</h4>
            <input type="number" name="jumlahPembelian" required>

            <button type="submit" name="hitungTotal">Hitung Total</button>
        </form>

        <?php
        if (isset($_POST['hitungTotal'])) {
            $nama = $_POST['namaBarang'];
            $harga = $_POST['hargaBarang'];
            $jumlah = $_POST['jumlahPembelian'];
            $diskonPersenan = 0;

            if ($harga < 0 || $jumlah < 1) {
                echo "<div class='error'>Error: Masukkan harga dan jumlah yang valid!</div>";
            } else {
                $total_harga = $harga * $jumlah;

                if ($total_harga >= 500000) {
                    $diskonPersenan = 20;
                } else if ($total_harga >= 250000) {
                    $diskonPersenan = 10;
                }

                $potongan = $total_harga * ($diskonPersenan / 100);
                $totalFinalisAkhir = $total_harga - $potongan;

                echo "<div class='struk'>";
                echo "<h3>Bukti Pembayaran</h3>";
                echo "<p>Nama Barang: " . $nama . "</p>";
                echo "<p>Harga Satuan: Rp " . $harga . "</p>";
                echo "<p>Jumlah Pembelian: " . $jumlah . "</p>";
                echo "<p>Diskon: " . $diskonPersenan . "% (Potongan: Rp " . $potongan . ")</p>";
                echo "<hr>";
                echo "<strong>Total Pembayaran: Rp " . $totalFinalisAkhir . "</strong>";
                echo "</div>";
            }
        }
        ?>
    </div>

</body>
</html>