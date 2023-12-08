<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_pasien");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nik" required>
                                            <label for="floatingInput">Nik</label>
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
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="tempat_tinggal" required>
                                            <label for="floatingInput">Nama Tempat Tinggal</label>
                                            <div class="invalid-feedback">
                                                Masukkan Tempat Tinggal.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="tempat_lahir" required>
                                            <label for="floatingInput">Tempat Lahir</label>
                                            <div class="invalid-feedback">
                                                Masukkan Tempat Lahir.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="jenis_kelamin" required>
                                            <label for="floatingInput">Jenis Kelamin</label>
                                            <div class="invalid-feedback">
                                                Masukkan Jenis Kelamin.
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
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="tempat_tinggal" required>
                                            <label for="floatingInput">Nama Tempat Tinggal</label>
                                            <div class="invalid-feedback">
                                                Masukkan Tempat Tinggal.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" style="background-color: rgb(9, 74, 53); color: white;" data-bs-dismiss="modal">Close</button>
                            <button type="submit" style="background-color: rgb(9, 74, 53); color: white;" name="input_user_validate" value="12345">save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>


        <!-- end tambah user baru -->

        <!-- modal Keluhan -->
        <div class="modal fade" id="ModalKeluhan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_input_keluhan.php" method="POST">
                            <input type="hidden" value="<?php echo $row['nik_pasien'] ?>" name="nik_pasien">

                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="" style="height: 100px" name="catatac"><?php echo $row['catatan'] ?></textarea>
                                <label for="floatingInput">catatan</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" style="background-color: rgb(9, 74, 53); color: white;" data-bs-dismiss="modal">Close</button>
                                <button type="submit" style="background-color: rgb(9, 74, 53); color: white;" name="input_daftarkeluhan_validate" value="12345"> Save </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- end modal Keluhan -->

        <?php
        foreach ($result as $row) {
        ?>

        <?php
        }
        if (empty($result)) {
            echo "Data user tidak ada";
        } else {
        ?>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nik</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Tempat Tinggal</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
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
                                <td><?php echo $row['tempat_tinggal'] ?></td>
                                <td><?php echo $row['tempat_lahir'] ?></td>
                                <td><?php echo $row['jenis_kelamin'] ?></td>
                                <td><?php echo $row['no_hp'] ?></td>
                                <td class="d-flex">
                                    <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalKeluhan<?php echo $row['nik_pasien'] ?>">Keluhan</button>
                                    <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['nik_pasien'] ?>"><i class="bi bi-pencil"></i></button>
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

<Script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
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
</Script>