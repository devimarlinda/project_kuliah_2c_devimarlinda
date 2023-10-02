<html>
    <body>
        <?php
        // Menggunakan variabel $i untuk iterasi
        for($i = 0; $i < 5; $i++)
        {
            if($i == 2 ) 
            {
                continue; // Melanjutkan ke iterasi berikutnya jika $i == 2
            }
            echo ("Nilai i : $i <br>");
        }
        echo("loop selesai");
        ?>
    </body>
</html>
