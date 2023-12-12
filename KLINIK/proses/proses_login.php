<?php
session_start();
include "connect.php";

$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "";

if (!empty($_POST['submit_validate'])) {
    // Check in tb_user
    $queryUser = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' && password = '$password'");
    $resultUser = mysqli_fetch_array($queryUser);

    // Check in tb_pasien if not found in tb_user
    if (!$resultUser) {
        $queryPasien = mysqli_query($conn, "SELECT * FROM tb_pasien WHERE username = '$username' && password = '$password'");
        $resultPasien = mysqli_fetch_array($queryPasien);

        if ($resultPasien) {
            $_SESSION['username_klinik'] = $username;
            // You may want to set a specific level for pasien, e.g., 'pasien'
            $_SESSION['level_klinik'] = 'pasien';
            header('location:../login');
        } else {
            ?>
            <script>
                alert('Username atau password yang Anda masukkan salah');
                window.location = '../login.php';
            </script>
            <?php
        }
    } else {
        $_SESSION['username_klinik'] = $username;
        $_SESSION['level_klinik'] = $resultUser['level'];
        header('location:../login');
    }
}
?>
