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


$film_id = $_GET['film_id'];


$sql = "SELECT * FROM filmler WHERE film_id = '$film_id'";
$result = $baglanti->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $film_adi = $row["film_adi"];
    $film_aciklama = $row["film_aciklama"];
    $film_resim = $row["film_resim"];
} else {
    die("Film bilgisi bulunamadı.");
}
$baglanti->close();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film ve Koltuk Seçimi</title>
    <link rel="stylesheet" href="CSS/stil.css">
</head>
<body>
    

    
    <div class="film-info">
        <img src="<?php echo $film_resim; ?>" alt="<?php echo $film_adi; ?>">
        <div class="film-details">
            <h2><?php echo $film_adi; ?></h2>
            <p><?php echo $film_aciklama; ?></p>
        </div>
    </div>

    
    <div class="selection-form">
        <h3>Koltuk ve Saat Seçimi</h3>
        <form action="kaydet.php" method="post">
            <input type="hidden" name="film_id" value="<?php echo $film_id; ?>">
            <label for="koltuk">Koltuk Seçimi:</label>
            <select name="koltuk" id="koltuk">
                <option value="1">Koltuk 1</option>
                <option value="2">Koltuk 2</option>
                <option value="3">Koltuk 3</option>
                <option value="4">Koltuk 4</option>
                <option value="5">Koltuk 5</option>
                <option value="6">Koltuk 6</option>
            </select>

            <label for="saat">Saat Seçimi:</label>
            <select name="saat" id="saat">
                <option value="09:00">09:00</option>
                <option value="11:00">11:00</option>
                <option value="13:00">13:00</option>
                <option value="22:00">22:00</option>
            </select>

            <button type="submit">Seçimi Kaydet</button>
        </form>
    </div>

</body>
</html>
