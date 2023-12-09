<?php
//session_start();
if (empty($_SESSION['username_klinik'])) {
    header('location:login');
}
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username ='$_SESSION[username_klinik]' ");
$hasil = mysqli_fetch_array($query);


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KLINIK - Sistem pendaftaran online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/CSS/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <script src=" https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

</head>

<body style="height: 3000px;">

    <!-- Header -->
    <?php include "header.php"; ?>
    <!-- end header -->
    <div class="container-lg ">
        <div class="row">
            <!-- sidebar -->
            <?php include "sidebar.php"; ?>
            <!-- end sidebar -->

            <!-- content -->
            <?php
            include $page;
            ?>

            <!-- End content -->
        </div>
        <div class="fixed-bottom text-center mb-2">
            klinik Andisa 2023
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
<script>

</script>