<?php
session_start();
require_once 'koneksi.php';

if (!empty($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = 'Username dan password wajib diisi.';
    } else {
        $stmt = mysqli_prepare($koneksi, 'SELECT id, username, nama, password FROM users WHERE username = ? LIMIT 1');
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'nama' => $user['nama']
            ];
            header('Location: index.php');
            exit();
        }

        $error = 'Username atau password salah.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SIAKAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
</head>
<body class="login-page">
    <div class="login-layout">
        <section class="login-visual">
            <div class="visual-overlay"></div>
            <div class="visual-content">
                <div class="visual-badge">🎓 Sistem Informasi Akademik</div>
                <h1>Kelola Data Akademik<br><span>Lebih Mudah & Teratur</span></h1>
                <p>Kelola mahasiswa dan program studi dalam satu sistem yang modern, cepat, dan nyaman digunakan.</p>
                <div class="visual-points">
                    <span>📚 Data Terorganisir</span>
                    <span>💻 Akses Mudah</span>
                    <span>📊 Informasi Terpusat</span>
                </div>
            </div>
        </section>

        <div class="login-card">
        <div class="login-brand">
            <div class="brand-icon">🎓</div>
            <div><strong>SIAKAD</strong><small>Manajemen Akademik</small></div>
        </div>
        <div class="login-heading">
            <h1>Selamat Datang</h1>
            <p>Masuk untuk mengelola data akademik.</p>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger py-2" role="alert"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" action="login.php" novalidate>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control form-control-lg" id="username" name="username" autocomplete="username" required autofocus>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control form-control-lg" id="password" name="password" autocomplete="current-password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-lg w-100">Masuk ke Sistem</button>
        </form>
        <div class="login-demo">Akun awal: <strong>admin</strong> / <strong>admin123</strong></div>
        </div>
    </div>
</body>
</html>
