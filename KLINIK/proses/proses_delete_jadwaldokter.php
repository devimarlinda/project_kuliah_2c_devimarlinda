<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "" ;

if(!empty($_POST['input_jadwaldokter_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_jadwal_dokter WHERE id = '$id'");
    if($query){
        $message = '<script>alert("Data berhasil dihapus")
                    window.location="../jadwaldokter"</script>
                    </script>';
    }else{
        $message = '<script>alert("Data gagal dihapus")</script>';
    }
}echo $message;
?>


