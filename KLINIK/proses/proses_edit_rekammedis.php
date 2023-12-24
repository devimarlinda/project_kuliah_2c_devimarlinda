<?php
include "connect.php";

// Inisialisasi $message
$message = "";

$id_rekammedis = (isset($_POST['id_rekammedis'])) ? htmlentities($_POST['id_rekammedis']) : "";
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$keluhan = (isset($_POST['keluhan'])) ? htmlentities($_POST['keluhan']) : "";

if (!empty($_POST['input_rekammedis_validate'])) {
    $query = mysqli_query($conn, "UPDATE tb_rekam_medis SET nama='$nama', keluhan='$keluhan' WHERE id_rekammedis='$id_rekammedis'");
    
    if ($query) {
        $message = '<script>alert("Data Keluhan berhasil diupdate")
                    window.location="../rekammedis"</script>';
    } else {
        $message = '<script>alert("Data gagal diupdate")
                    window.location="../rekammedis"</script>';
    }
}

// Output $message di sini
echo $message;

?>
