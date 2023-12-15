<?php
if (isset($_POST['submit_register']) && $_POST['submit_register'] === 'register') {
    // Collect user input data
    $nik_pasien = $_POST['nik_pasien'];
    $nama = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $alamat = $_POST['alamat'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "";

    // Validasi NIK harus angka
    if (!is_numeric($nik_pasien)) {
        $message = '<script>alert("NIK harus berupa angka."); 
        window.location="../register.php"</script>';
        echo $message;
        exit();
    }

    // Validasi nomor HP harus angka
    if (!is_numeric($no_hp)) {
        $message = '<script>alert("Nomor HP harus berupa angka."); 
        window.location="../register.php"</script>';
        echo $message;
        exit();
    }

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=db_klinik", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if NIK already exists
        $stmt = $pdo->prepare("SELECT * FROM tb_pasien WHERE nik_pasien = :nik_pasien");
        $stmt->bindParam(':nik_pasien', $nik_pasien);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $message = '<script>alert("NIK sudah terdaftar"); 
            window.location="../register.php"</script>';
        } else {
            // Check if username already exists
            $stmt = $pdo->prepare("SELECT * FROM tb_pasien WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $message = '<script>alert("Username sudah terdaftar"); 
                window.location="../register.php"</script>';
            } else {
                // Insert new user
                $stmt = $pdo->prepare("INSERT INTO tb_pasien (nik_pasien, nama_lengkap, username, alamat, tempat_lahir, tanggal_lahir, jenis_kelamin, no_hp, password) VALUES (:nik_pasien, :nama_lengkap, :username, :alamat, :tempat_lahir, :tanggal_lahir, :jenis_kelamin, :no_hp, :password)");
                $stmt->bindParam(':nik_pasien', $nik_pasien);
                $stmt->bindParam(':nama_lengkap', $nama);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':alamat', $alamat);
                $stmt->bindParam(':tempat_lahir', $tempat_lahir);
                $stmt->bindParam(':tanggal_lahir', $tanggal_lahir);
                $stmt->bindParam(':jenis_kelamin', $jenis_kelamin);
                $stmt->bindParam(':no_hp', $no_hp);
                $stmt->bindParam(':password', $password);
                $stmt->execute();
                
                $message = '<script>alert("Register berhasil"); window.location="../login.php"</script>';
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    echo $message;
}
?>
