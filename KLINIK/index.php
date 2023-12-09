
           <?php
            session_start();
            if (isset($_GET['x']) && $_GET['x'] == 'dashboard') {
                $page = "home.php";
                include "main.php";
                
            }elseif(isset($_GET['x']) && $_GET['x']=='user'){
                if($_SESSION['level_klinik']==1){
                    $page = "user.php";
                    include "main.php";
                }else{
                    $page = "home.php";
                    include "main.php";
                }
            } elseif (isset($_GET['x']) && $_GET['x'] == 'jadwaldokter') {
                $page = "jadwaldokter.php";
                include "main.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'pasien') {
                $page = "pasien.php";
                include "main.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'rekammedis') {
                $page = "rekammedis.php";
                include "main.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'report') {
                if($_SESSION['level_klinik']==1){
                $page = "report.php";
                include "main.php";
                }else{
                    $page = "home.php";
                    include "main.php";
                }
            } elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
                include "login.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
                include "proses/proses_logout.php";
            }else {
                $page = "home.php";
                include "main.php";
                
            }
            ?>

           