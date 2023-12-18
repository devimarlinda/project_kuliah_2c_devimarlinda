<?php
include "connect.php";

// Ambil data dari form
$id_rekammedis = (isset($_POST['id_rekammedis'])) ? htmlentities($_POST['id_rekammedis']) : "";
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$waktu_berkunjung = (isset($_POST['waktu_berkunjung'])) ? htmlentities($_POST['waktu_berkunjung']) : "";
$keluhan = (isset($_POST['keluhan'])) ? htmlentities($_POST['keluhan']) : "";

// Query untuk menyimpan data ke dalam tb_report
$query_report = mysqli_query($conn, "INSERT INTO tb_report (nama, waktu_berkunjung, keluhan) VALUES ('$nama', '$waktu_berkunjung', '$keluhan')");

// Query untuk menghapus data yang sudah dikonfirmasi dari tb_rekam_medis
$query_delete = mysqli_query($conn, "DELETE FROM tb_rekam_medis WHERE id_rekammedis = '$id_rekammedis'");

// Cek keberhasilan query
if ($query_report && $query_delete) {
    $message = '<script>alert("Data berhasil dikonfirmasi dan dipindahkan ke report")
                window.location="../rekammedis"</script>';
} else {
    $message = '<script>alert("Terjadi kesalahan, data tidak dapat dikonfirmasi")
                window.location="../rekammedis"</script>';
}

// Outputkan pesan
echo $message;
?>
