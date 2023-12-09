<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- costum css -->
    <link rel="stylesheet" href="style.css">
</head>
<style>
    /* mengatur warna backgroud dan padding pada tag body bagian atas agar form tidak menempel diatas */
    body {
        background: rgb(9, 74, 53);
        padding-top: 10vh;
    }

    /* mengatur warna backgroud form */
    /*form {
        /*background: url(assets/img/bg01.jpg);
    /*}

    /* mengatur border dan padding class form-container */
    .form-container {
        border-radius: 10px;
        padding: 30px;
    }
</style>

<body>
    <section class="container-fluid">
        <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
        <section class="row justify-content-center <?php echo $row['id'] ?>">
            <section class="col-12 col-sm-6 col-md-4 text-white">
                <form style="border-radius :20px ;" class="form-container" class="needs-validation" novalidate action="proses/proses_input_register.php" method="POST">
                    <h2 class="text-center font-weight-bold"> Register </h2>
                    <div class="form-group">
                        <label for="nama" class="form-label">Nik</label>
                        <input type="text" class="form-control" id="nik_pasien" name="nik_pasien">
                        <div class="invalid-feedback">
                            Masukkan nik.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="form-label">Nama lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                        <div class="invalid-feedback">
                            Masukkan nama.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username" class="form-label">username</label>
                        <input type="email" class="form-control" id="username" name="username">
                    </div>

                    <div class="form-group">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                        <div class="invalid-feedback">
                            Masukkan alamat.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                        <div class="invalid-feedback">
                            Masukkan Tempat Lahir.
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example" name="jenis_kelamin" required>
                                <option selected hidden value="">Pilih Jenis Kelamin</option>
                                <option disabled value="1">Perempuan</option>
                                <option disabled value="2">Laki-Laki</option>

                            </select>
                            <div class="invalid-feedback">
                                Pilih Jenis Kelamin.
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="no_hp">Nomor HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp">
                        <div class="invalid-feedback">
                            Masukkan no hp.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <div class="invalid-feedback">
                            Masukkan password.
                        </div>
                    </div>

                    <button class="w-100 btn btn-lg text-white" style="background: #2E2F26;" type="submit" name="input_register_validate" value="abc">Register</button>
                    <div class="form-footer mt-2">
                        <p> Sudah punya account? <a href="login">Login</a></p>
                    </div>
                </form>
            </section>
        </section>
    </section>

    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, danyang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>