<html> 
    <head>
        <title><buku_tamu class="php"></buku_tamu></title>
    </head>
    <body>
        <?php
            $nama=$_POST["nama"];
            $email=$_POST["email"];
            $komentar=$_POST["komentar"];
            ?>
        <h1>Data buku tamu</h1>
        <hr>
        Nama anda :  <?php echo $nama;?>
        <br>
        Email address :  <?php echo $email; ?>
        <br>
        Komentar : <br> <textarea name="komentar" cols="40" rows="5"><?php echo $komentar; ?></textarea>
        <br>
        
    </body>
</html>