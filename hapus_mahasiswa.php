<?php
// Konfigurasi koneksi database
$host = 'localhost';
$username ='root';
$password = '';
$database = 'absensi';

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $username, $password, $database);
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Fungsi untuk menghapus entri berdasarkan ID
function hapusMahasiswa($koneksi, $id) {
    $query = "DELETE FROM mahasiswa WHERE id = '$id'";
    if (mysqli_query($koneksi, $query)) {
        echo "Entri berhasil dihapus.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// Panggil fungsi penghapusan jika ada parameter ID yang diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    hapusMahasiswa($koneksi, $id);
}

// Tutup koneksi database
mysqli_close($koneksi);
?>
