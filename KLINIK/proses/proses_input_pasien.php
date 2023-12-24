<?php
include "connect.php";

$nik_pasien = (isset($_POST['nik_pasien'])) ? htmlentities($_POST['nik_pasien']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$nama_lengkap = (isset($_POST['nama_lengkap'])) ? htmlentities($_POST['nama_lengkap']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
$tempat_lahir = (isset($_POST['tempat_lahir'])) ? htmlentities($_POST['tempat_lahir']) : "";
$tanggal_lahir = (isset($_POST['tanggal_lahir'])) ? htmlentities($_POST['tanggal_lahir']) : "";
$jenis_kelamin = (isset($_POST['jenis_kelamin'])) ? htmlentities($_POST['jenis_kelamin']) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";
$no_hp = (isset($_POST['no_hp'])) ? htmlentities($_POST['no_hp']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "";


// Validasi NIK harus angka
if (!is_numeric($nik_pasien)) {
    $message = '<script>alert("NIK harus berupa angka."); 
    window.location="../pasien"</script>';
    echo $message;
}

// Validasi Nomor HP harus angka
if (!is_numeric($no_hp)) {
    $message = '<script>alert("Nomor HP harus berupa angka."); 
    window.location="../pasien"</script>';
    echo $message;
}

// Validasi NIK dan Username yang sudah ada
$query_check_existing = mysqli_query($conn, "SELECT * FROM tb_pasien WHERE nik_pasien = '$nik_pasien' OR username = '$username'");
if (mysqli_num_rows($query_check_existing) > 0) {
    $message = '<script>alert("NIK atau username sudah terdaftar.");
     window.location="../pasien"</script>';
    echo $message;
}

// Jika semua validasi berhasil, lakukan INSERT
if (!empty($_POST['input_pasien_validate'])) {
    
    $query_insert = mysqli_query($conn, "INSERT INTO tb_pasien (nik_pasien,username,nama_lengkap,alamat,tempat_lahir,tanggal_lahir,jenis_kelamin,level,no_hp,password) 
    VALUES('$nik_pasien','$username','$nama_lengkap','$alamat','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$level','$no_hp','$password')");

    if (!$query_insert) {
        $message = '<script>alert("Data Pasien gagal dimasukkan"); 
        window.location="../pasien"</script>';
    } else {
        $message = '<script>alert("Data Pasien berhasil dimasukkan");
         window.location="../pasien"</script>';
    }
}

echo $message;
