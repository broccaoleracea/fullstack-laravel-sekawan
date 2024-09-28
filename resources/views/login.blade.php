<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Web Perpustakaan</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/styles.css">
        <link rel="stylesheet" href="/styles/styles.css"> 
</head>
<body>
    <!-- Section Login -->
    <section class="login-container">
        <div class="card shadow-lg">
            <div class="card-header">
                <img src="./media/book.png" alt="..." class="img-logo">
                <h3 class="text-center">Login - Web Perpustakaan</h3>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <label for="username" class="form-label">Username *</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username Anda">
                    </div>
                    <div class="form-group my-3">
                        <label for="password" class="form-label">Password *</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password Anda">
                    </div>
                    <div class="form-group my-3">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <a href="#"><p class="text-primary text-center">Tidak punya akun? Silahkan mendaftar</p></a>
            </div>
        </div>
    </section>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>