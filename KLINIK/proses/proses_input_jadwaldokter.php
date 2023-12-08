<?php
include "connect.php";
$foto = (isset($_POST['foto'])) ? htmlentities($_POST['foto']) : "";
$name_dokter = (isset($_POST['nama_dokter'])) ? htmlentities($_POST['nama_dokter']) : "";
$spesialis = (isset($_POST['spesialis'])) ? htmlentities($_POST['spesialis']) : "";
$jadwal_dokter = (isset($_POST['jadwal_dokter'])) ? htmlentities($_POST['jadwal_dokter']) : "";

if (!empty($_POST['input_jadwaldokter_validate'])) {
    $query = mysqli_query($conn, "INSERT INTO tb_jadwal_dokter (foto, nama_dokter, spesialis, jadwal_dokter)
    values ('$foto', '$name_dokter', '$spesialis', '$jadwal_dokter')");

    if (!$query) {
        $message = '<script>alert("Data gagal dimasukkan")</script>';
    } else {
        $message = '<script>alert("Data berhasil dimasukkan"); window.location="../jadwaldokter"</script>';
    }
}

echo $message;
?>
