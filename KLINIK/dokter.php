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
                                <th scope="col">Foto</th>
                                <th scope="col">Nama dokter</th>
                                <th scope="col">Spesialis</th>
                                <th scope="col">Jadwal dokter</th>
                                
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