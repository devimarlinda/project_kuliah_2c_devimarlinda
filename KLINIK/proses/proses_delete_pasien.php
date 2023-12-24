<?php
include "connect.php";
$nik_pasien = (isset($_POST['nik_pasien'])) ? htmlentities($_POST['nik_pasien']) : "" ;

if(!empty($_POST['input_pasien_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_pasien WHERE nik_pasien = '$nik_pasien'");
    if($query){
        $message = '<script>alert("Data Pasien berhasil dihapus")
                    window.location="../pasien"</script>
                    </script>';
    }else{
        $message = '<script>alert("Data Pasien gagal dihapus")
                    window.location="../pasien"</script>';
    }
}echo $message;
?>


