<?php
include "connect.php";
$nik = (isset($_POST['nik'])) ? htmlentities($_POST['nik']) : "" ;

if(!empty($_POST['input_user_validate'])){
    $query = mysqli_query($conn, "UPDATE tb_user SET password=md5('password') WHERE nik = '$nik'");
    if($query){
        $message = '<script>alert("Password berhasil direset")
                    window.location="../user"</script>
                    </script>';
    }else{
        $message = '<script>alert("Password gagal direset")</script>';
    }
}echo $message;
?>