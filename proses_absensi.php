<?php
// Konfigurasi koneksi database
$host = 'localhost';
$username ='root';
$password = '';
$database = 'absensi';

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $username, $password, $database);
if (!$koneksi) {
    die("koneksi database gagal: ". mysqli_connect_error());
}
// Fungsi untuk menyimpan data absensi

function simpanAbsensi($koneksi, $nama, $nim) {
    $waktuAbsen = date('Y-m-d H:i:s'); // Capture the current date and time
    $query = "INSERT INTO mahasiswa (nama, nim, waktu_absen) VALUES ('$nama', '$nim', NOW())";
    if (mysqli_query($koneksi, $query)) {
        echo "Absensi berhasil disimpan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}


// Memproses data absensi jika tombol submit ditekan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        simpanAbsensi ($koneksi, $nama, $nim);
    }
}

// Menutup koneksi database
mysqli_close($koneksi);

// Mengarahkan ke file daftar_absensi.php setelah memproses data absensi
header("Location: daftar_absensi.php");
exit();
?>