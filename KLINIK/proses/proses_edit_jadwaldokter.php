<?php
include "connect.php";
$foto = (isset($_POST['foto'])) ? htmlentities($_POST['foto']) : "";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$nama_dokter = (isset($_POST['nama_dokter'])) ? htmlentities($_POST['nama_dokter']) : "";
$spesialis = (isset($_POST['spesialis'])) ? htmlentities($_POST['spesialis']) : "";
$jadwal_dokter = (isset($_POST['jadwal_dokter'])) ? htmlentities($_POST['jadwal_dokter']) : "";

if (!empty($_POST['input_jadwaldokter_validate'])) {
    $query = mysqli_query($conn, "UPDATE tb_jadwal_dokter SET nama_dokter='$nama_dokter', spesialis='$spesialis', jadwal_dokter='$jadwal_dokter' WHERE id='$id'");
    if ($query) {
        $message = '<script>alert("Data berhasil diupdate")
                    window.location="../jadwaldokter"</script>';
    } else {
        $message = '<script>alert("Data gagal diupdate")
                    window.location="../jadwaldokter"</script>';
    }
}
echo $message;
?>
