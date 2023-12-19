<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_report");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Report
        </div>
        <div class="card-body">
           

            <?php
            if (empty($result)) {
                echo "Data user tidak ada";
            } else {
            ?>



                <div class="table-responsive">
                    <table class="table table-hover" id="example">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Rekammedis</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Waktu Kunjungan</th>
                                <th scope="col">Keluhan</th>
                                

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