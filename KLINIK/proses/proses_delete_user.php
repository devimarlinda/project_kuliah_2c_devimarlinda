<?php
include "connect.php";
$nik = (isset($_POST['nik'])) ? htmlentities($_POST['nik']) : "" ;

if(!empty($_POST['input_user_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_user WHERE nik = '$nik'");
    if($query){
        $message = '<script>alert("Data berhasil dihapus");
                    window.location="../user"</script>
                    </script>';
    }else{
        $message = '<script>alert("Data gagal dihapus")</script>';
    }
}
echo $message;
?>