<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal no 5</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container" style="margin-top: 20px">
        <div class="card">
            <div class="card-body">
                <h1>Karaketer Terbanyak</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="kata">Masukkan kata:</label>
                        <input type="text" name="kata" id="kata" class="form-control" require>
                        <button type="submit" class="btn btn-success mt-5">Hitung</button>
                    </div>
                </form>
                <?php
                require_once 'functionsoal5.php';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $kata = $_POST['kata'];
                    $hasil = karakterTerbanyak($kata);

                    echo "<h1 class='text-center'>Hasil: $hasil </h1>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>