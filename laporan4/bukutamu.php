<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contoh Form dengan POST</title>
</head>
<body>
    <h1>Buku Tamu</h1>
    komentar dan saran sangat kami butuhkan untuk 
    meningkatakan kualitas situs kami.
    <hr>
    <form action="proses_bukutamu.php" method="post">
    <pre>
    Nama Anda : <input type="text" name="nama" size="25" maxlenghth="50"> <br>
    Email Address : <input type="text" name="email" size="25" maxlenghth="50"><br>
    Komentar :      <br> <textarea name="komentar" cols="40" rows="5"> </textarea>
    <input type="submit" value="kirim">
    <input type="reset" value="ulangi">
    </pre>
</form>
</body>
</html>
