<?php
if (!empty($_SESSION['username_klinik'])) {
    header('location:login');
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title> Registration</title>

    <!-- Load jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Load jQuery UI -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .password-icon {
            cursor: pointer;
            position: absolute;
            top: 50%;
            right: 16px;
            transform: translateY(-50%);
            z-index: 1;
        }
    </style>

    <link href="assets/CSS/login.CSS" rel="stylesheet">
</head>


<body class="text-center d-flex align-items-center py-4 bg-body-tertiary">

    <main class="form-signin w-100 m-auto">
        <form class="needs-validation" novalidate action="proses/proses_register.php" method="POST">
            <i class="bi bi-house-add fs-1"></i>
            <h1 class="h3 mb-3 fw-normal">Formulir Pendaftaran Online Pasien di Klinik Andisa</h1>

            <div class="form-floating position-relative mt-1">
                <input name="nik_pasien" class="form-control" id="nik_pasien" placeholder="nik_pasien" required>
                <label for="nik_pasien">Nik</label>
                <div class="invalid-feedback">
                    Masukkan nik.
                </div>
            </div>

            <div class="form-floating position-relative mt-1">
                <input name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="nama_lengkap" required>
                <label for="nama_lengkap">Nama</label>
                <div class="invalid-feedback">
                    Masukkan Nama.
                </div>
            </div>
            <div class="form-floating position-relative mt-1">
                <input name="username" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email address</label>
                <div class="invalid-feedback">
                    Masukkan email yang valid.
                </div>
            </div>

            <div class="form-floating position-relative mt-1">
                <input name="alamat" class="form-control" id="alamat" placeholder="alamat" required>
                <label for="alamat">Alamat</label>
                <div class="invalid-feedback">
                    Masukkan Alamat.
                </div>
            </div>
            <div class="form-floating position-relative mt-1">
                <input name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="tempat_lahir" required>
                <label for="tempat_lahir">Tempat Lahir</label>
                <div class="invalid-feedback">
                    Masukkan Tempat Lahir.
                </div>
            </div>
            <div class="form-floating position-relative mt-1">
                <input name="tanggal_lahir" class="form-control" id="tanggal_lahir" placeholder="tanggal_lahir" required>
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <div class="invalid-feedback">
                    Masukkan Tanggal Lahir.
                </div>
            </div>

            <script>
                $(function() {
                    // Inisialisasi datepicker pada elemen dengan id "tanggal_lahir"
                    $("#tanggal_lahir").datepicker({
                        dateFormat: "yy-mm-dd",
                        changeMonth: true,
                        changeYear: true,
                        yearRange: "c-100:c+10"
                    });
                });
            </script>

           
            <div class="form-floating position-relative mt-1">
                <select class="form-select" aria-label="Default select example" required name="jenis_kelamin" id="">
                    <?php
                    $data = array("Perempuan", "Laki-Laki");
                    foreach ($data as $key => $value) {
                        // Menggunakan nilai langsung dari array sebagai value opsi
                        if ($row['jenis_kelamin'] == $value) {
                            echo "<option selected value=\"$value\">$value</option>";
                        } else {
                            echo "<option value=\"$value\">$value</option>";
                        }
                    }
                    ?>
                    
                </select>
                <label for="level">Jenis Kelamin</label>
                <div class="invalid-feedback">
                    Masukkan Jenis Kelamin.
                </div>
            </div>
            <div class="form-floating position-relative mt-1">
                <select class="form-select" id="level" name="level" required>
                    <option selected hidden value="">Pilih Level</option>
                    <option value="3">Pasien</option>
                </select>
                <label for="level">Level</label>
                <div class="invalid-feedback">
                    Pilih Level.
                </div>
            </div>

            <div class="form-floating position-relative mt-1">
                <input name="no_hp" class="form-control" id="no_hp" placeholder="no_hp" required>
                <label for="no_hp">Nomor HP</label>
                <div class="invalid-feedback">
                    Masukkan no hp.
                </div>
            </div>
            <div class="form-floating position-relative mt-1">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
                <i class="bi bi-eye password-icon" onclick="togglePasswordVisibility('floatingPassword')"></i>
                <div class="invalid-feedback">
                    Please enter a password.
                </div>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" style="background-color: rgb(9, 74, 53); color: white;" name="submit_register" value="register">Daftar</button>
            <p class="mt-3">
                Already have an account? <a href="login.php">Login </a>.
            </p>
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2022 - <?php echo date("Y") ?></p>
        </form>
    </main>

    <script>
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()

        function togglePasswordVisibility(passwordFieldId) {
            var passwordField = document.getElementById(passwordFieldId);
            var passwordIcon = document.querySelector('.password-icon');

            if (passwordField.type === "password") {
                passwordField.type = "text";
                passwordIcon.classList.remove('bi-eye');
                passwordIcon.classList.add('bi-eye-slash');
            } else {
                passwordField.type = "password";
                passwordIcon.classList.remove('bi-eye-slash');
                passwordIcon.classList.add('bi-eye');
            }
        }
    </script>
</body>

</html>