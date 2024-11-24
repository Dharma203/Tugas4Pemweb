<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, textarea, button {
            width: 100%;
            margin-top: 5px;
        }
        button {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <form id="registrationForm" action="process.php" method="POST" enctype="multipart/form-data">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required minlength="3" maxlength="50">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required minlength="6">

        <label for="age">Umur:</label>
        <input type="number" id="age" name="age" required min="10" max="100">

        <label for="file">Upload File (Teks):</label>
        <input type="file" id="file" name="file" accept=".txt" required>

        <button type="submit">Submit</button>
    </form>

    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            const fileInput = document.getElementById('file');
            const file = fileInput.files[0];

            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    alert("Ukuran file tidak boleh lebih dari 2MB!");
                    e.preventDefault();
                }
                if (!file.type.match('text/plain')) {
                    alert("File harus bertipe .txt!");
                    e.preventDefault();
                }
            }
        });
    </script>
</body>
</html>
