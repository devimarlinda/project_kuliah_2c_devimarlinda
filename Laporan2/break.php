<html>
    <body>
        <?php
        // Menggunakan variabel $i untuk iterasi dan menginisialisasi dengan 0
        for($i = 0; $i < 5; $i++)
        {
            if($i == 2 ) 
            {
                break; // Keluar dari loop jika $i == 2
            }
            echo ("Nilai i : $i <br>");
        }
        echo("loop selesai");
        ?>
    </body>
</html>
