<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "filmoloji";

$baglanti = new mysqli($servername, $username, $password, $dbname);
if ($baglanti->connect_error) {
    die("Veritabanı bağlantısında hata: " . $baglanti->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['new_username'];
    $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    
    $check_username_query = "SELECT * FROM users WHERE username='$username'";
    $check_username_result = $baglanti->query($check_username_query);
    if ($check_username_result->num_rows > 0) {
        echo '<script>alert("Bu kullanıcı adı zaten kullanımda.");
        window.location.href = "index.php";</script>';
    } else {
        
        $insert_user_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($baglanti->query($insert_user_query) === TRUE) {
            echo '<script>alert("Kullanıcı başarıyla kaydedildi.");
            window.location.href = "index.php";</script>';
           
            
            exit;
        } else {
            echo "Hata: " . $insert_user_query . "<br>" . $baglanti->error;
        }
    }
}

$baglanti->close();
?>
