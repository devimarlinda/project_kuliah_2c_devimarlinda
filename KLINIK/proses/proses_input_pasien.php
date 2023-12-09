<?php
include "connect.php";
$nik_pasien = (isset($_POST['nik_pasien'])) ? htmlentities($_POST['nik_pasien']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$nama_lengkap = (isset($_POST['nama_lengkap'])) ? htmlentities($_POST['nama_lengkap']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
$tempat_lahir = (isset($_POST['tempat_lahir'])) ? htmlentities($_POST['tempat_lahir']) : "";
$jenis_kelamin = (isset($_POST['jenis_kelamin'])) ? htmlentities($_POST['jenis_kelamin']) : "";
$no_hp = (isset($_POST['no_hp'])) ? htmlentities($_POST['no_hp']) : "";
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


if (!empty($_POST['input_pasien_validate'])) {
    $query = mysqli_query($conn, "INSERT INTO tb_pasien (nik_pasien,username,nama_lengkap,alamat,tempat_lahir,jenis_kelamin,no_hp,password) 
    VALUES('$nik_pasien','$username','$nama_lengkap','$alamat','$tempat_lahir','$jenis_kelamin','$no_hp','$password')");
    
        if (!$query) {
            $message = '<script>alert("Data gagal dimasukkan")
            window.location="../pasien"</script>';
                        
        } else {
            $message = '<script>alert("Data berhasil dimasukkan")
                    window.location="../pasien"</script>';
        }
    }

echo $message;
?>