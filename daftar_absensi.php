<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pemantauan Buah</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Daftar Pemantauan Buah</h1>
    <?php
    // Konfigurasi koneksi database
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database= 'absensi';
    // Membuat koneksi ke database
    $koneksi =mysqli_connect($host, $username, $password, $database);
    if (!$koneksi) {
    die("Koneksi database gagal: ".mysqli_connect_error());
    }
    // Fungsi untuk mendapatkan daftar absensi mahasiswa

    function getDaftarAbsensi ($koneksi) {
    $query = "SELECT * FROM mahasiswa";
    $result = mysqli_query($koneksi, $query);
    return $result;
    }
    // Menampilkan daftar absensi mahasiswa
    $daftarAbsensi = getDaftarAbsensi ($koneksi);
    if (mysqli_num_rows($daftarAbsensi) > 0) {
        echo "<table>";
        echo "<tr><th>Id Buah</th><th>Jenis Buah</th><th>Waktu Penambahan</th><th>Aksi</th></tr>";
        while ($row = mysqli_fetch_assoc($daftarAbsensi)) {
            echo "<tr>";
            echo "<td>" . $row[ 'nama'] . "</td>";
            echo "<td>". $row['nim'] . "</td>";
            echo "<td>" . $row[ 'waktu_absen'] . "</td>";
            echo "<td><a href='hapus_mahasiswa.php?id=" . $row['id'] . "'>Hapus</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
         echo "Belum ada data.";
    }

    echo "<br>";

    if (isset($_SERVER['HTTP_REFERER']) && basename ($_SERVER['HTTP_REFERER']) === 'daftar_mahasiswa.php') {
        echo '<a href="daftar_mahasiswa.php"><button >Kembali ke Pendaftaran</button></a>';
    } else {
        echo '<button enabled>Kembali ke Pendaftaran</button>';
    }
    // Menutup koneksi database
    mysqli_close($koneksi);
    ?>
</body>
</html>