<?php
session_start();
include "connect.php";

$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "";

if (!empty($_POST['submit_validate'])) {
    // periksa di tb_user
    $queryUser = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' && password = '$password'");
    $resultUser = mysqli_fetch_array($queryUser);

    // Periksa di tb_pasien jika tidak ditemukan di tb_user
    if (!$resultUser) {
        $queryPasien = mysqli_query($conn, "SELECT * FROM tb_pasien WHERE username = '$username' && password = '$password'");
        $resultPasien = mysqli_fetch_array($queryPasien);

        if ($resultPasien) {
            $_SESSION['username_klinik'] = $username;
            $_SESSION['level_klinik'] = 'pasien'; // Sesuaikan dengan level yang diinginkan
            header('location:../login');
        } else {
            ?>
            <script>
                alert('Username atau password yang Anda masukkan salah');
                window.location = '../login';
            </script>
            <?php
        }
    } else {
        // Sesuaikan level pengguna dengan level yang diinginkan
        $mapped_level = mapUserLevel($resultUser['level']); // Gantilah dengan fungsi pemetaan yang sesuai
        $_SESSION['username_klinik'] = $username;
        $_SESSION['level_klinik'] = $mapped_level;      
        header('location:../login');
    }
}

// Fungsi pemetaan level pengguna ke level yang diinginkan
function mapUserLevel($user_level) {
    // Misalnya, jika level pengguna 'admin' diubah menjadi 'user'
    if ($user_level == 'admin') {
        return 'user';
    }
    if ($user_level == 'dokter') {
        return 'user';
    }
    if ($user_level == 'pasien') {
        return 'pasien';
    }
    // Tambahkan pemetaan level lainnya jika diperlukan
    return $user_level;
}
?>
