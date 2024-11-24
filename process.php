<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi input teks
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $age = intval($_POST['age']);
    $errors = [];

    if (strlen($name) < 3 || strlen($name) > 50) {
        $errors[] = "Nama harus antara 3-50 karakter.";
    }
    if (strlen($password) < 6) {
        $errors[] = "Password minimal 6 karakter.";
    }
    if ($age < 10 || $age > 100) {
        $errors[] = "Umur harus antara 10-100.";
    }

    // Validasi file
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        if ($file['size'] > 2 * 1024 * 1024) {
            $errors[] = "Ukuran file tidak boleh lebih dari 2MB.";
        }
        if (pathinfo($file['name'], PATHINFO_EXTENSION) !== 'txt') {
            $errors[] = "File harus bertipe .txt.";
        }

        // Baca isi file
        $fileContent = file_get_contents($file['tmp_name']);
    } else {
        $errors[] = "File wajib diunggah.";
    }

    // Cek validasi
    if (!empty($errors)) {
        echo "<h3>Terjadi kesalahan:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo '<a href="form.php">Kembali</a>';
        exit;
    }

    // Simpan data untuk halaman berikutnya
    session_start();
    $_SESSION['formData'] = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'age' => $age,
        'fileContent' => $fileContent,
        'userAgent' => $_SERVER['HTTP_USER_AGENT']
    ];
    header('Location: result.php');
    exit;
}
