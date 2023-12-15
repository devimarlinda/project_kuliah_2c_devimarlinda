

<div class="col-lg-3">
    <nav class="navbar navbar-expand-lg bg-light rounded-3 border mt-2">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width:250px">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                <ul class="navbar-nav custom-nav-pills flex-column justify-content-end flex-grow-1 pe-0">
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'dashboard') || !isset($_GET['x'])) ? 'active link-light' :'link-dark'; ?>" aria-current="page" href="dashboard"> <i' class="bi bi-house-door"></i> Dashboard</a>
                        </li>   
                        <?php if (!is_null($hasil) && isset($hasil['level']) && $hasil['level'] == 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'user') ? 'active link-light' : 'link-dark'; ?>" href="user"><i class="bi bi-person-vcard"></i> User</a>
                        </li>
                        <?php } ?>

                        <li class="nav-item">
                            <a class="nav-link link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'jadwaldokter') ? 'active link-light' : 'link-dark'; ?>" href="jadwaldokter"><i class="bi bi-calendar-date"></i> Jadwal Dokter</a>
                        </li>
                      

                        <?php if (!is_null($hasil) && isset($hasil['level']) && $hasil['level'] == 1) { ?> 
                        <li class="nav-item">
                            <a class="nav-link link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'pasien') ? 'active link-light' : 'link-dark'; ?>" href="pasien"><i class="bi bi-person-fill-add"></i> Pasien</a>
                        </li>
                        <?php } ?>

                        <?php if (!is_null($hasil) && isset($hasil['level']) && ($hasil['level'] == 1 || $hasil['level'] == 2)) { ?>  
                        <li class="nav-item">
                            <a class="nav-link link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'rekammedis') ? 'active link-light' : 'link-dark'; ?>" href="rekammedis"><i class="bi bi-card-checklist"></i> Rekam Medis</a>
                        </li>
                        <?php } ?>
                        
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div