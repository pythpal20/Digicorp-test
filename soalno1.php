<!-- ini adalah view untuk functionsoal1.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 1</title>
    <!-- saya pakai bootstrap saja biar sedikit menarik -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "tb_token";

    $conn = new mysqli($servername, $username, $password, $dbname);
    ?>
    <div class="container" style="margin-top: 20px;">
        <div class="card">
            <div class="card-body">
                <h1>Token Generator & Verify</h1>
                <form method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" class="form-control" name="username" require>
                    </div>
                    <div class="form-group">
                        <label for="token">Token</label>
                        <input type="text" name="token" id="token" class="form-control" require>
                    </div>
                    <button type="submit" class="btn btn-success" name="generate">Generate Token</button>
                    <button type="submit" class="btn btn-danger" name="verify">Verify Token</button>
                    <?php
                    // ambil dulu functionsoal1.php
                    require_once 'functionsoal1.php';

                    if (isset($_POST['generate'])) {
                        $username = $_POST['username'];
                        $token = generate($username);

                        echo "Generate token: $token<br />";
                    } elseif (isset($_POST['verify'])) {
                        $username = $_POST['username'];
                        $token = $_POST['token'];

                        $verification = verify_token($username, $token);
                        if ($verification) {
                            echo " <span class='alert alert-success'>Token verified for user $username</span><br/>";
                        } else {
                            echo " <span class='alert alert-danger'>Token not verified for user $username</span><br/>";
                        }
                    }
                    ?>
                </form>
            </div>
            <div class="card-footer">
                <small>
                    <ul>
                        <li>Masukkan username dan tekan tombol generate untuk mendapatkan token.</li>
                        <li>Masukkan username dan token kemudian tekan tombol verify token untuk verifikasi token.</li>
                    </ul>
                </small>
            </div>
        </div>
        <!-- saya menampilkan hasil generate token disini -->
        <div class="card">
            <div class="card-body">
                <h3>Table token</h3>
                <table class="table table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Token</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql    = "SELECT * FROM tokens  ORDER BY id DESC";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['user'] ?></td>
                                <td>
                                    <?php
                                    $num = 1;
                                    // jika token lebih dari satu maka akan ditampilkan dalam list
                                    $tokens = explode(',', $row['tokens']);
                                    foreach ($tokens as $token) {
                                        $listoken = str_replace(array('"', '[', ']'), '', $token);
                                        echo $num++ . ". " . $listoken . "<br>";
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>