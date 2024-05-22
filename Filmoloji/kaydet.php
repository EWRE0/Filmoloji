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


if (!isset($_POST['film_id'])) {
    die("Film ID'si alınamadı.");
}
$film_id = $_POST['film_id'];


$koltuk = $_POST['koltuk'];
$saat = $_POST['saat'];


if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    
    $sql_film = "SELECT film_adi FROM filmler WHERE film_id = '$film_id'";
    $result_film = $baglanti->query($sql_film);
    if ($result_film->num_rows > 0) {
        $row_film = $result_film->fetch_assoc();
        $film_adi = $row_film['film_adi'];
    } else {
        die("Film bulunamadı.");
    }

    
    $sql = "INSERT INTO kullanici_secimleri (username, film, koltuk, saat) VALUES ('$username', '$film_adi', '$koltuk', '$saat')";
    if ($baglanti->query($sql) === TRUE) {
        echo '<script>alert("Bilet Başarıyla Alındı. İyi Seyirler");
        window.location.href = "homepage.php";</script>';
    } else {
        echo "Hata: " . $sql . "<br>" . $baglanti->error;
    }
} else {
    echo '<script>alert("Lütfen giriş yapın.");
    window.location.href = "index.php";</script>';
}

$baglanti->close();
?>
