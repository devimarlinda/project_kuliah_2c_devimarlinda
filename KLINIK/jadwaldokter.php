<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_jadwal_dokter");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Jadwal dokter
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button style="background-color: rgb(9, 74, 53); color: white;" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah jadwal dokter</button>
                </div>
            </div>


            <!-- Modal Tambah jadwaldokter baru -->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jadwal dokter</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_jadwaldokter.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Your Name" name="foto" required>
                                            <label class="input-group-text" for="uploadFoto">Upload Foto dokter</label>
                                            <div class="invalid-feedback">
                                                Masukkan File Foto dokter
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama_dokter" required>
                                            <label for="floatingInput">Nama dokter</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama dokter.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default s
                                            elect example" name="spesialis" required>
                                                <option selected hidden value="0">Pilih Spesialis</option>
                                                <option value="1">dokter umum</option>
                                                <option value="2">dokter gigi</option>

                                            </select>
                                            <label for="floatingInput">Spesialis</label>
                                            <div class="invalid-feedback">
                                                Pilih Spesialis.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default s
                                            elect example" name="jadwal_dokter" required>
                                                <option selected hidden value="0">Pilih Jadwal dokter</option>
                                                <option value="1">Senin</option>
                                                <option value="2">Selasa</option>
                                                <option value="3">Rabu</option>
                                                <option value="4">Kamis</option>
                                            

                                            </select>
                                            <label for="floatingInput">jadwal dokter</label>
                                            <div class="invalid-feedback">
                                                Pilih Jadwal dokter
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" style="background-color: rgb(9, 74, 53); color: white;" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" style="background-color: rgb(9, 74, 53); color: white;" name="input_jadwaldokter_validate" value="12345">save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- end tambah user baru -->

            <?php
            foreach ($result as $row) {
            ?>

                
                <!-- Modal New -->
                <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"> Detail Jadwal dokter</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_input_jadwaldokter.php" method="POST">
                                    <div class="row">
                                    <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" value=" <?php echo $row['nama_dokter'] ?>">
                                                <label for="floatingInput">Nama</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama.
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <select disabled class="form-select" aria-label="Default select example" required name="spesialis" id="">
                                                    <?php
                                                    $data = array("dokter umum", "dokter gigi");
                                                    foreach ($data as $key => $value) {
                                                        if ($row['spesialis'] == $key + 1) {
                                                            echo "<option selected value=" . ($key + 1) . "> $value</option>";
                                                        } else {
                                                            echo "<option value=" . ($key + 1) . "> $value</option>";
                                                        }
                                                    }
                                                    ?>

                                                </select>
                                                <label for="floatingInput">spesialis</label>
                                                <div class="invalid-feedback">
                                                    Pilih Spesialis.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <select disabled class="form-select" aria-label="Default select example" required name="spesialis" id="">
                                                    <?php
                                                    $data = array("senin", "selasa", "rabu","kamis");
                                                    foreach ($data as $key => $value) {
                                                        if ($row['jadwal_dokter'] == $key + 1) {
                                                            echo "<option selected value=" . ($key + 1) . "> $value</option>";
                                                        } else {
                                                            echo "<option value=" . ($key + 1) . "> $value</option>";
                                                        }
                                                    }
                                                    ?>

                                                </select>
                                                <label for="floatingInput">Jadwal dokter</label>
                                                <div class="invalid-feedback">
                                                    Pilih Jadwal dokter.
                                                </div>
                                            </div>
                                        </div>
                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" style="background-color: rgb(9, 74, 53); color: white;" data-bs-dismiss="modal">Close</button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end modal view -->

                <!-- modal edit -->
                <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Jadwal dokter</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_edit_jadwaldokter.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Your Name" name="foto" required>
                                                <label class="input-group-text" for="uploadFoto">Upload Foto dokter</label>
                                                <div class="invalid-feedback">
                                                    Masukkan File Foto dokter
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama_dokter" required>
                                                <label for="floatingInput">Nama dokter</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama dokter.
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" aria-label="Default s
                                                    elect example" name="spesialis" required>
                                                    <option selected hidden value="0">Pilih Spesialis</option>
                                                    <option value="1">dokter umum</option>
                                                    <option value="2">dokter gigi</option>
                      
                                                </select>
                                                <label for="floatingInput">Spesialis</label>
                                                <div class="invalid-feedback">
                                                    Pilih Spesialis.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" aria-label="Default s
                                                    elect example" name="jadwal_dokter" required>
                                                    <option selected hidden value="0">Pilih Jadwal dokter</option>
                                                    <option value="1">Senin</option>
                                                    <option value="2">Selasa</option>
                                                    <option value="3">Rabu</option>
                                                    <option value="4">Kamis</option>

                                                </select>
                                                <label for="floatingInput">Jadwal dokter</label>
                                                <div class="invalid-feedback">
                                                    Pilih Jadwal dokter.
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" style="background-color: rgb(9, 74, 53); color: white;" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" style="background-color: rgb(9, 74, 53); color: white;" name="input_jadwaldokter_validate" value="12345"> Save </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- end modal edit -->


                <!-- modal Delete -->
                <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete jadwal dokter</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_delete_jadwaldokter.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                    <div class="col-lg-12">
                                        <?php
                                        if ($row['nama_dokter'] == $_SESSION['username_klinik']) {
                                            echo "<div class='alert alert-dangar'> Anda tidak dapat menghapus akun sendiri </div>";
                                        } else {
                                            echo "Apakah Anda Yakin Ingin Menghapus Jadwal dokter <b>$row[nama_dokter]</b>";
                                        }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" style="background-color: rgb(9, 74, 53); color: white;" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" style="background-color: rgb(9, 74, 53); color: white;" name="input_jadwaldokter_validate" value="12345" <?php echo ($row['nama_dokter'] == $_SESSION['username_klinik']) ?
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

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama dokter</th>
                                <th scope="col">Spesialis</th>
                                <th scope="col">Jadwal dokter</th>
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
                                    <td>
                                        <div style="width: 90px;"> <img src="assets/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="...">
                                    </td>
                                    
                                    <td><?php echo $row['nama_dokter'] ?></td>
                                    <td> <?php
                                            if ($row['spesialis'] == 1) {
                                                echo "dokter umum";
                                            } elseif ($row['spesialis'] == 2) {
                                                echo "dokter gigi";
                                            } 
                                            ?></td>
                                    <td> <?php
                                            if ($row['jadwal_dokter'] == 1) {
                                                echo "senin";
                                            } elseif ($row['jadwal_dokter'] == 2) {
                                                echo "selasa";
                                            } elseif ($row['jadwal_dokter'] == 3) {
                                                echo "rabu";
                                            } elseif ($row['jadwal_dokter'] == 4) {
                                                echo "kamis";
                                            } 
                                            ?></td>
                                    <td class="d-flex">
                                        <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id'] ?>"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil"></i></button>
                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i class="bi bi-trash"></i></button>

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