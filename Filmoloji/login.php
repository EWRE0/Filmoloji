<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "filmoloji";

$baglanti = new mysqli($servername, $username, $password, $dbname);
if ($baglanti->connect_error) {
    die("Veritabanı bağlantısında hata: " . $baglanti->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $baglanti->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            
            $_SESSION['username'] = $username;
           
            echo '<script>
            alert("Giriş Başarılı!");    window.location.href = "homepage.php";</script>';
            exit;
        } else {
            echo '<script>alert("Hatalı kullanıcı adı veya şifre.");
            window.location.href = "index.php";</script>';
        }
    } else {
        echo '<script>alert("Böyle Bir Kullanıcı Bulunamadı.");
        window.location.href = "index.php";</script>';
    }
}

$baglanti->close();
?>
