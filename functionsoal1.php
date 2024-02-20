<?php

/**
 * saya menggunakan database mysql 
 * nama database adalah tb_token
 * nama table adalah tokens
 * dalam table tokens terdapat field : id, user, tokens
 * saya sertakan query di akhir
 **/
function connectDB()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tb_token";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi dengan database gagal! : " . $conn->connect_error);
    }

    return $conn;
}

// fungsi untuk generate token menggunakan parameter user
function generate($user)
{
    $conn   = connectDB();

    $token  = bin2hex(random_bytes(16));
    // ini akan menghasilkan string hexadesimal sepanjang 32 karakter

    // cek database apakah user yang akan diinput sudah ada ?
    $sql = "SELECT * from tokens WHERE user = '$user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // jika user sudah ada
        $row = $result->fetch_assoc();
        $tokens = json_decode($row['tokens']);
        if (count($tokens) >= 10) {
            array_shift($tokens);
        } // jika token sudah > 10 maka token diawal akan dibuang 

        $tokens[] = $token;
        $token_str = json_encode($tokens);

        $sql = "UPDATE tokens SET tokens = '$token_str' WHERE user = '$user'";
        $conn->query($sql);
    } else {
        // jika user belum ada
        $tokens     = array($token);
        $token_str  = json_encode($tokens);
        $sql        = "INSERT INTO tokens (user, tokens) VALUE ('$user','$token_str') ";
        $conn->query($sql);
    }

    $conn->close();
    return $token;
}

// fungsi untuk memverifikasi token dengan parameter  user dan token
function verify_token($user, $token)
{
    // koneksi dari function connectDB;
    $conn = connectDB();

    // cek dari database 
    $sql = "SELECT * FROM tokens WHERE user = '$user'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $tokens = json_decode($row['tokens']);

        $key = array_search($token, $tokens);
        if($key !== false) {
            // jika token ditemukan , maka hapus token dari array
            unset($tokens[$key]);
            //update token di table tokens
            $token_str = json_encode(array_values($tokens));
            $sql = "UPDATE tokens SET token = '$token_str' WHERE user = '$user'";
            $conn->query($sql);

            $conn->close();
            return true;
        }
    }

    $conn->close();
    return false;
}
