<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_rekam_medis");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Rekam Medis
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button style="background-color: rgb(9, 74, 53); color: white;" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah Keluhan</button>
                </div>
            </div>


            <!-- Modal Tambah keluhan Baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah keluhan pasien</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_rekammedis.php" method="POST">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" required>
                                            <label for="floatingInput">Nama</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama .
                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="keluhan" placeholder="keluhan" name="keluhan" required>
                                            <label for="pelanggan">keluhan Pasien</label>
                                            <div class="invalid-feedback">
                                                Masukkan Keluhan pasien
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="modal-footer">
                                    <button type="button" style="background-color: rgb(9, 74, 53); color: white;" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" style="background-color: rgb(9, 74, 53); color: white;" name="input_rekammedis_validate" value="12345">buat keluhan</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Modal Tambah keluhan Baru-->




            <?php
            if (empty($result)) {
                echo "Data user tidak ada";
            } else {
            ?>



                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Rekammedis</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Waktu Kunjungan</th>
                                <th scope="col">Keluhan</th>
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
                                    <td><?php echo $row['id_rekammedis'] ?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo $row['waktu_berkunjung'] ?></td>
                                    <td><?php echo $row['keluhan'] ?></td>

                                    <td class="d-flex">
                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_rekammedis'] ?>"><i class="bi bi-pencil"></i></button>
                                        <button class="btn btn-success btn-sm me-2" data-bs-toggle="modal" data-bs-target="#ModalKonfirmasi<?php echo $row['id_rekammedis'] ?>"><i class="bi bi-check"></i></button>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="ModalEdit<?php echo $row['id_rekammedis'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit dan tambah keluhan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="needs-validation" novalidate action="proses/proses_edit_rekammedis.php" method="POST">
                                                    <input type="hidden" value="<?php echo $row['id_rekammedis'] ?>" name="id_rekammedis">


                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-floating mb-3">
                                                                <input disabled type="text" class="form-control" id="id_rekammedis" name="id_rekammedis" value=" <?php echo $row['id_rekammedis'] ?>">
                                                                <label for="id_rekammedis">Id Rekammedis</label>
                                                                <div class="invalid-feedback">
                                                                    Masukkan id rekammedis
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" required value="<?php echo $row['nama'] ?>">
                                                                <label for="floatingInput">Nama</label>
                                                                <div class="invalid-feedback">
                                                                    Masukkan Nama.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" id="keluhan" placeholder="keluhan" name="keluhan" required>
                                                                <label for="keluhan">keluhan Pasien</label>
                                                                <div class="invalid-feedback">
                                                                    Masukkan Keluhan pasien
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" style="background-color: rgb(9, 74, 53); color: white;" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" style="background-color: rgb(9, 74, 53); color: white;" name="input_rekammedis_validate" value="12345"> Save </button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Edit -->

                                <!--  Modal konfirmasi -->
                                <div class="modal fade" id="ModalKonfirmasi<?php echo $row['id_rekammedis'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="needs-validation" novalidate action="proses/proses_konfirmasi_rekammedis.php" method="POST">
                                                    <input type="text" hidden value="<?php echo $row['id_rekammedis'] ?>" name="id_rekammedis">
                                                    <input type="text" hidden value="<?php echo $row['nama'] ?>" name="nama">
                                                    <input type="text" hidden value="<?php echo $row['waktu_berkunjung'] ?>" name="waktu_berkunjung">
                                                    <input type="text" hidden value="<?php echo $row['keluhan'] ?>" name="keluhan">
                                                    
                                                    <div class="col-lg-12">
                                                        Apakah anda yakin ingin mengkonfirmasi data <b><?php echo $row['nama'] ?></b>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" name="konfirmasi" value="12345">konfirmasi</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal konfirmasi -->

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            }
            ?>