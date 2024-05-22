<?php
session_start();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biletlerim</title>
    <link rel="stylesheet" href="CSS/bltstyle.css">
</head>
<body>
    
    <div class="navbar">
        <div class="navbar-container">
            <a href="#" class="navbar-brand">Filmoloji</a>
            <ul class="navbar-menu">
                <li><a href="homepage.php">Ana Sayfa</a></li>
                <li><a href="#">Vizyona Girecek Filmler</a></li>
            </ul>
            <?php
            
            if(isset($_SESSION['username'])) {
                echo '<button class="navbar-button" onclick="window.location.href=\'logout.php\'">Çıkış Yap</button>';
            } else {
                
                echo '<a href="index.php" class="navbar-button">Giriş Yap</a>';
            }
            ?>
        </div>
    </div>

    
    <div class="container">
        <h1>Biletlerim</h1>
        
        <?php
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "filmoloji";
        
        
        $baglanti = new mysqli($servername, $username, $password, $dbname);
        
        
        if ($baglanti->connect_error) {
            die("Veritabanına bağlanırken hata oluştu: " . $baglanti->connect_error);
        }
        
        
        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            
            $sql = "SELECT id, film, koltuk, saat, satin_alma_saati FROM kullanici_secimleri WHERE username = '$username'";
            $result = $baglanti->query($sql);
        
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    echo '<div class="ticket-card">';
                    echo '<div class="ticket-info">';
                    echo '<h2>Film: ' . $row["film"] . '</h2>';
                    echo '<p>Koltuk: ' . $row["koltuk"] . '</p>';
                    echo '<p>Saat: ' . $row["saat"] . '</p>';
                    echo '<p>Satın Alım Tarihi: ' . $row["satin_alma_saati"] . '</p>';
                    
                    echo '<form method="post">';
                    echo '<input type="hidden" name="cancel_ticket_id" value="' . $row["id"] . '">';
                    echo '<button type="submit" name="cancel_ticket" class="cancel-button">Bileti İptal Et</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<a style='color: white;'>Satın alınmış bilet bulunamadı.</a>";
            }
        } else {
            echo "<a style='color: white;'>Oturum açılmadı.</a>";
        }
        
       
        $baglanti->close();
        ?>

        
        <?php
        if(isset($_POST['cancel_ticket'])) {
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "filmoloji";

            
            $baglanti = new mysqli($servername, $username, $password, $dbname);

            
            if ($baglanti->connect_error) {
                die("Veritabanına bağlanırken hata oluştu: " . $baglanti->connect_error);
            }

            $ticket_id = $_POST['cancel_ticket_id'];
            $sql = "DELETE FROM kullanici_secimleri WHERE id = $ticket_id";
            if ($baglanti->query($sql) === TRUE) {
                
            } else {
                echo '<div class="error-message">Bilet iptal edilirken bir hata oluştu: ' . $baglanti->error . '</div>';
            }

            
            $baglanti->close();
        }
        ?>
    </div>

    
    <div class="user-info">
        <?php
        
        if(isset($_SESSION['username'])) {
            echo "<p>Hoş geldiniz, " . $_SESSION['username'] . "</p>";
        } else {
            
            echo "<p>Hoş geldiniz, misafir</p>";
        }
        ?>
    </div>
</body>
</html>
