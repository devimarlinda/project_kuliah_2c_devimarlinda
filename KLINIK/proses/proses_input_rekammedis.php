
<?php
include "connect.php";
$id_rekammedis = (isset($_POST['id_rekammedis'])) ? htmlentities($_POST['id_rekammedis']) : "";
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$keluhan = (isset($_POST['keluhan'])) ? htmlentities($_POST['keluhan']) : "";

if(!empty($_POST['input_rekammedis_validate'])){
    $query = mysqli_query($conn, "INSERT INTO tb_rekam_medis (nama,keluhan) values('$nama','$keluhan')");
    if (!$query) {
        $message = '<script>alert("Data gagal dimasukkan")
        window.location="../rekammedis"</script>s</script>';
                    
    } else {
        $message = '<script>alert("Data berhasil dimasukkan")
                window.location="../rekammedis"</script></script>';
    }
}echo $message;
?>




