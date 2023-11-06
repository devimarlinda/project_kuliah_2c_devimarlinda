<?php
include "connect.php";
$nama_menu= (isset($_POST['nama_menu'])) ?  htmlentities($_POST['nama_menu']) : "";
//$username = (isset($_POST['username'])) ?  htmlentities($_POST['username']) : "";
//$level = (isset($_POST['level'])) ?  htmlentities($_POST['level']) : "";
//$nohp = (isset($_POST['nohp'])) ?  htmlentities($_POST['nohp']) : "";
//$alamat= (isset($_POST['alamat'])) ?  htmlentities($_POST['alamat']) : "";
//$password = md5('password');

$kode_rand = rand(10000,99999)."-";
$target_dir = "../assets/img/".$kode_rand ;
$target_file = $target_dir.basename($_FILES['foto']['name']) ;
$imageType = strtolower(pathinfo ($target_file, PATHINFO_EXTENSION));



if(!empty($_POST['input_menu_validate'])){
    // cek apakah gambar atau bukan
    $cek = getimagesize($_FILES['foto']['tmp_name']);
    if($cek === false) {
        $message = " Ini bukan file gambar";
        $statusUpload = 0;
    }else{
        $statusUpload = 1;
        if(file_exists($target_file)){
            $message = "Maaf, File yang dimasukkan Telah Ada";
            $statusUpload = 0;
        }else{
            if($_FILES['foto']['name'] > 500000 ){ //500kb
                $message = "File foto yang diupload terlalu besar";
                $statusUpload = 0;
            }else{
                if($imageType != "png" && $imageType != "jpeg" && $imageType != "gif"){
                    $message = "Maaf, hanya diperbolehkan gambar yang memiliki format JPG, JPEG,PNG dan GIF";
                    $statusUpload = 0;
                }
            }
        }
    }
    if($statusUpload == 0){
        $message = '<script>alert("'.$messag.' Gambar Tidak Dapat di Upload");
                    window.location="../menu"</script>' ;
    }else{
        $select = mysqli_query($conn, " SELECT * FROM tb_daftar_menu WHERE nama_menu ='$nama_menu' ");
        if(mysqli_num_rows($select)>0){
            $message = '<script>alert("Nama menu yang dimaksukkan sudah ada");
            window.location="../menu"</script>' ;
     
        }else{
            if(move_uploaded_file ($_FILES['foto']['tmp_name'],$target_file)){
                $query = mysqli_query($conn, "INSERT INTO tb_daftar_menu (foto,nama_menu) values ('".$kode_rand.$_FILES['foto']['name']."') ");
                if (!$query) {
                    $message = '<script>alert("Data berhasil dimasukkan");
                                 window.location="../menu"</script>';
            }else{
                $message = '<script>alert("Data gagal dimasukkan");
                                 window.location="../menu"</script>';
            }
            }else{
                $message = '<script>alert("Maaf. Terjadi kesalahan file tidak dapat diupload");
                window.location="../menu"</script>';
        }
    }
}

}
echo$message;
?>
