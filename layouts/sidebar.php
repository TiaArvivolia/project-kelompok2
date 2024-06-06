<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="img/polinema.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Survey Kepuasan</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="home.php" class="nav-link <?php echo ($menu == 'index') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="survey.php" class="nav-link <?php echo ($menu == 'survey') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Survey
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="bank_soal.php" class="nav-link <?php echo ($menu == 'bank_soal') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Bank Soal
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="user.php" class="nav-link <?php echo ($menu == 'user') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pengguna
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="kategori.php" class="nav-link <?php echo ($menu == 'kategori') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Kategori
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="survey_soal.php" class="nav-link <?php echo ($menu == 'survey_soal') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-poll"></i>
                        <p>
                            Survey Soal
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Responden
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="responden_dosen.php"
                                class="nav-link <?php echo ($menu == 'dosen') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dosen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="responden_mahasiswa.php"
                                class="nav-link <?php echo ($menu == 'mahasiswa') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mahasiswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="responden_tendik.php"
                                class="nav-link <?php echo ($menu == 'tendik') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tendik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="responden_alumni.php"
                                class="nav-link <?php echo ($menu == 'alumni') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Alumni</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="responden_ortu.php"
                                class="nav-link <?php echo ($menu == 'ortu') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Orang Tua</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="responden_industri.php"
                                class="nav-link <?php echo ($menu == 'industri') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Industri</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>