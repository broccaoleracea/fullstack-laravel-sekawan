<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tambah Buku - Admin Perpustakaan</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/styles.css">
        <link rel="stylesheet" href="/styles/styles.css"> 
        <script src="<https://use.fontawesome.com/releases/v6.1.0/js/all.js>" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">Admin Dashboard</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Buku
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Kategori Buku
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-pencil"></i></div>
                                Penulis
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-house"></i></div>
                                Penerbit
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-hand"></i></div>
                                Peminjaman
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-gear"></i></div>
                                Pengaturan
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-right-from-bracket"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin Perpustakaan
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Buku</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Halaman Update Data Buku</li>
                        </ol>
                        <form action="">
                            <div class="row gap-3">
                                <div class="col-12 col-md-4 form-group">
                                    <label for="judul_buku" class="form-label">Judul Buku *</label>
                                    <input type="text" name="judul_buku" id="judul_buku" class="form-control" placeholder="Masukkan judul buku">
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="penulis_buku" class="form-label">Penulis Buku *</label>
                                    <select name="penulis_buku" id="penulis_buku" class="form-control">
                                        <option selected>-Pilih Penulis Buku-</option>
                                        <option value="Tere Liye">Tere Liye</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="penerbit_buku" class="form-label">Penerbit Buku *</label>
                                    <select name="penerbit_buku" id="penerbit_buku" class="form-control">
                                        <option selected>-Pilih Penerbit Buku-</option>
                                        <option value="Gramedia">Gramedia</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="tahun_terbit" class="form-label">Tahun Terbit *</label>
                                    <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control" placeholder="Masukkan tahun terbit">
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="kategori_buku" class="form-label">Kategori Buku *</label>
                                    <select name="kategori_buku" id="kategori_buku" class="form-control">
                                        <option selected>-Pilih Kategori Buku-</option>
                                        <option value="Fiksi">Fiksi</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="rak_buku" class="form-label">Rak Buku *</label>
                                    <select name="rak_buku" id="rak_buku" class="form-control">
                                        <option selected>-Pilih Rak Buku-</option>
                                        <option value="4-L">4-L</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="isbn" class="form-label">Nomor ISBN *</label>
                                    <input type="text" name="isbn" id="isbn" class="form-control" placeholder="Masukkan nomor ISBN">
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-12 col-md-4">
                                    <button class="btn btn-warning">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Web Perpustakaan 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="./js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
