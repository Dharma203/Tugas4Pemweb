<?php
session_start();
if (!isset($_SESSION['formData'])) {
    header('Location: form.php');
    exit;
}

$data = $_SESSION['formData'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Data Pendaftaran</h1>
    <table>
        <tr>
            <th>Nama</th>
            <td><?= htmlspecialchars($data['name']) ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= htmlspecialchars($data['email']) ?></td>
        </tr>
        <tr>
            <th>Umur</th>
            <td><?= htmlspecialchars($data['age']) ?></td>
        </tr>
        <tr>
            <th>User Agent</th>
            <td><?= htmlspecialchars($data['userAgent']) ?></td>
        </tr>
    </table>

    <h2>Isi File:</h2>
    <table>
        <tr>
            <th>Baris</th>
            <th>Isi</th>
        </tr>
        <?php
        $lines = explode("\n", $data['fileContent']);
        foreach ($lines as $index => $line) {
            echo "<tr><td>" . ($index + 1) . "</td><td>" . htmlspecialchars($line) . "</td></tr>";
        }
        ?>
    </table>
</body>
</html>
