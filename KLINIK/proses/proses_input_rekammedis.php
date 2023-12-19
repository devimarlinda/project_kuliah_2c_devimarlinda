<?php
include "connect.php";
$message = ""; // Inisialisasi pesan
$id_rekammedis = (isset($_POST['id_rekammedis'])) ? htmlentities($_POST['id_rekammedis']) : "";
$keluhan = (isset($_POST['keluhan'])) ? htmlentities($_POST['keluhan']) : "";
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";

if (!empty($_POST['input_rekammedis_validate'])) {
    
    // Periksa apakah pasien sudah terdaftar di tb_pasien
    $select = mysqli_query($conn, "SELECT * FROM tb_pasien WHERE nama_lengkap = '$nama'");
    
    if (mysqli_num_rows($select) > 0) {
        // Pasien terdaftar, lanjutkan untuk menambahkan rekam medis
        
        // Ambil ID pasien dari tb_pasien untuk digunakan dalam INSERT ke tb_rekam_medis
        $row = mysqli_fetch_assoc($select);
        $id_pasien = $row['id_pasien'];
        
        // Gunakan prepared statement untuk mencegah SQL injection
        $stmt = mysqli_prepare($conn, "INSERT INTO tb_rekam_medis (id_rekammedis, keluhan, nama) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "iss", $id_rekammedis, $keluhan, $nama);
        $query = mysqli_stmt_execute($stmt);

        if ($query) {
            $message = '<script>alert("Data berhasil dimasukkan");
                        window.location="../rekam"</script>';
        } else {
            $message = '<script>alert("Data gagal dimasukkan: ' . mysqli_error($conn) . '");
                        window.location="../rekam"</script>';
        }
    } else {
        $message = '<script>alert("Pasien belum terdaftar di tb_pasien");
                    window.location="../rekam"</script>';
    }
}

echo $message;
?>
