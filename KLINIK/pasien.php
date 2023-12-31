<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_pasien");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>


<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Pasien
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button style="background-color: rgb(9, 74, 53); color: white;" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah pasien</button>
                </div>
            </div>


            <!-- Modal Tambah user baru -->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pasien</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_pasien.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nik_pasien" required>
                                            <label for="floatingInput">Nik Pasien</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nik.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" required>
                                            <label for="floatingInput">Username</label>
                                            <div class="invalid-feedback">
                                                Masukkan Username.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama_lengkap" required>
                                            <label for="floatingInput">Nama lengkap</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama Lengkap.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="alamat" required>
                                            <label for="floatingInput">Alamat</label>
                                            <div class="invalid-feedback">
                                                Masukkan Alamat.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="tempat_lahir" required>
                                            <label for="floatingInput">Tempat Lahir</label>
                                            <div class="invalid-feedback">
                                                Masukkan Tempat Lahir.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="tanggal_lahir" placeholder="Your Name" name="tanggal_lahir" required>
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <div class="invalid-feedback">
                                                Masukkan Tanggal Lahir.
                                            </div>
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

                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" name="jenis_kelamin" required>
                                                <option selected hidden value="">Pilih Jenis Kelamin</option>
                                                <option value="Perempuan">Perempuan</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                            </select>
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <div class="invalid-feedback">
                                                Pilih Jenis Kelamin.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="88XXXXX" name="no_hp">
                                            <label for="floatingInput">No HP</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="floatingInput" placeholder="password" name="password">
                                            <label for="floatingPassword">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" name="level" required>
                                                <option selected hidden value="3">Pasien</option>
                                            </select>
                                            <label for="floatingInput">Level User</label>
                                        </div>
                                    </div>
                                </div>
                          </div>
                        <div class="modal-footer">
                            <button type="button" style="background-color: rgb(9, 74, 53); color: white;" data-bs-dismiss="modal">Close</button>
                            <button type="submit" style="background-color: rgb(9, 74, 53); color: white;" name="input_pasien_validate" value="12345">save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- end tambah user baru -->

            <?php
            foreach ($result as $row) {
            ?>

                <!-- Modal New -->
                <div class="modal fade" id="ModalView<?php echo $row['nik_pasien'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"> Detail Data Pasien</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_input_pasien.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nik_pasien" value=" <?php echo $row['nik_pasien'] ?>" required>
                                                <label for="floatingInput">Nik Pasien</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nik.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input disabled type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" value=" <?php echo $row['username'] ?>" required>
                                                <label for="floatingInput">Username</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Username.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama_lengkap" value=" <?php echo $row['nama_lengkap'] ?>" required>
                                                <label for="floatingInput">Nama lengkap</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama Lengkap.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="alamat" value=" <?php echo $row['alamat'] ?>" required>
                                                <label for="floatingInput">Alamat</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Alamat.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="tempat_lahir" value=" <?php echo $row['tempat_lahir'] ?>" required>
                                                <label for="floatingInput">Tempat Lahir</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Tempat Lahir.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="tanggal_lahir" value=" <?php echo $row['tanggal_lahir'] ?>" required>
                                                <label for="floatingInput">Tanggal Lahir</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Tanggal Lahir.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="jenis_kelamin" value=" <?php echo $row['jenis_kelamin'] ?>" required>
                                                <label for="floatingInput">Jenis Kelamin</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Jenis Kelamin.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input disabled type="number" class="form-control" id="floatingInput" placeholder="08XXXXX" name="no_hp" value="<?php echo $row['no_hp'] ?>">
                                                <label for="floatingInput">No HP</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input disabled type="password" class="form-control" id="floatingInput" placeholder="password" name="password" value=" <?php echo $row['password'] ?>" required>
                                                <label for="floatingPassword">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input disabled type="level" class="form-control" id="floatingInput" placeholder="level" name="level" value=" <?php echo $row['level'] ?>" required>
                                                <label for="floatingPassword">Level</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                 </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end modal view -->


                <!-- modal Delete -->
                <div class="modal fade" id="ModalDelete<?php echo $row['nik_pasien'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Pasien</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_delete_pasien.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['nik_pasien'] ?>" name="nik_pasien">
                                    <div class="col-lg-12">
                                        <?php
                                        if ($row['username'] == $_SESSION['username_klinik']) {
                                            echo "<div class='alert alert-dangar'> Anda tidak dapat menghapus akun sendiri </div>";
                                        } else {
                                            echo "Apakah Anda Yakin Ingin Menghapus Data Pasien <b>$row[username]</b>";
                                        }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" style="background-color: rgb(9, 74, 53); color: white;" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" style="background-color: rgb(9, 74, 53); color: white;" name="input_pasien_validate" value="12345" <?php echo ($row['username'] == $_SESSION['username_klinik']) ?
                                                                                                                                                                        'disabled' : ''; ?>>Hapus</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- end modal Delect -->




            <?php
            }
            if (empty($result)) {
                echo "Data user tidak ada";
            } else {
            ?>

                <div class="table-responsive mt-2">
                    <table class="table table-hover" id="example">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">Nik Pasien</th>
                                <th scope="col">Username</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Level</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no++ ?></th>
                                    <td><?php echo $row['nik_pasien'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php echo $row['nama_lengkap'] ?></td>
                                    <td><?php echo $row['alamat'] ?></td>
                                    <td><?php echo $row['tempat_lahir'] ?></td>
                                    <td><?php echo $row['tanggal_lahir'] ?></td>
                                    <td><?php echo $row['jenis_kelamin'] ?></td>
                                    <td> <?php
                                            if ($row['level'] == 3) {
                                                echo "pasien";
                                            }
                                            ?></td>

                                    <td><?php echo $row['no_hp'] ?></td>
                                    <td class="d-flex">

                                        <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['nik_pasien'] ?>"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['nik_pasien'] ?>"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

</html>