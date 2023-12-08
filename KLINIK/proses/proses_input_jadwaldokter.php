<?php
include "connect.php";
$message = ""; // Inisialisasi pesan
$nama_dokter = (isset($_POST['nama_dokter'])) ? htmlentities($_POST['nama_dokter']) : "";
$spesialis = (isset($_POST['spesialis'])) ? htmlentities($_POST['spesialis']) : "";
$jadwal_dokter = (isset($_POST['jadwal_dokter'])) ? htmlentities($_POST['jadwal_dokter']) : "";

if (!empty($_POST['input_jadwaldokter_validate'])) {
    // Cek apakah file foto diunggah
    if (!empty($_FILES['foto']['name'])) {
        $kode_rand = rand(10000, 99999) . "-";
        $target_dir = "../assets/img/" . $kode_rand;
        $target_file = $target_dir . basename($_FILES['foto']['name']);
        $imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Cek apakah file yang diunggah adalah gambar
        $cek = getimagesize($_FILES['foto']['tmp_name']);
        if ($cek === false) {
            $message = "Ini bukan file gambar";
        } else {
            // Cek apakah file sudah ada
            if (file_exists($target_file)) {
                $message = "Maaf, file yang dimasukkan telah ada";
            } else {
                // Cek ukuran file
                if ($_FILES['foto']['size'] > 500000) { // 500Kb
                    $message = "File foto yang diupload terlalu besar";
                } else {
                    // Cek format file
                    if ($imageType != 'jpg' && $imageType != 'png' && $imageType != "jpeg" && $imageType != "gif") {
                        $message = "Maaf, hanya diperbolehkan gambar yang memiliki format JPG, JPEG, PNG, GIF";
                    } else {
                        // Pindahkan file ke direktori tujuan
                        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                            // Lakukan operasi database setelah berhasil upload
                            include "connect.php"; // Sisipkan ini jika belum dilakukan sebelumnya

                            $select = mysqli_query($conn, "SELECT * FROM tb_jadwal_dokter WHERE nama_dokter = '$nam_dokter'");
                            if (mysqli_num_rows($select) > 0) {
                                $message = '<script>alert("Nama dokter yang dimasukkan telah ada");
                                            window.location="../jadwaldokter"</script>';
                            } else {
                                $query = mysqli_query($conn, "INSERT INTO tb_jadwal_dokter (foto,nama_dokter,spesialis,jadwal_dokter) values('" . $kode_rand . $_FILES['foto']['name'] . "','$name_dokter','$spesialis','$jadwal_dokter')");
                                if ($query) {
                                    $message = '<script>alert("Data berhasil dimasukkan");
                                                window.location="../jadwaldokter"</script>';
                                } else {
                                    $message = '<script>alert("Data gagal dimasukkan");
                                                window.location="../jadwaldokter"</script>';
                                }
                            }
                        } else {
                            $message = '<script>alert("Maaf, terjadi kesalahan file tidak dapat diupload");
                                        window.location="../jadwaldokter"</script>';
                        }
                    }
                }
            }
        }
    } 
}

echo $message;
?>
