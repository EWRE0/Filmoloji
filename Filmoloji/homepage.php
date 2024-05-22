<?php
session_start();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ana Sayfa</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    
    <div class="navbar">
        <div class="navbar-container">
            
            <div class="user-info">
                <?php
                
                if(isset($_SESSION['username'])) {
                    echo "<p>Hoş geldiniz, " . $_SESSION['username'] . "</p>";
                } else {
                    
                    echo "<p>Hoş geldiniz, misafir</p>";
                }
                ?>
            </div>
            <a style="cursor: default;" class="navbar-brand">Filmoloji</a>
            <ul class="navbar-menu">
                <li><a href="homepage.php">Ana Sayfa</a></li>
                <li><a href="#">Vizyona Girecek Filmler</a></li>
            </ul>
            <button class="navbar-button-1" onclick="window.location.href='mytickets.php'">Biletlerim</button>
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
        <h1>En Yeni Filmler</h1>

        
        <div class="film-container">
            <?php
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "filmoloji";

            $baglanti = new mysqli($servername, $username, $password, $dbname);
            if ($baglanti->connect_error) {
                die("Veritabanı bağlantısında hata: " . $baglanti->connect_error);
            }

            
            $sql = "SELECT * FROM filmler";
            $result = $baglanti->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="film-card">';
                    echo '<img src="' . $row["film_resim"] . '" alt="' . $row["film_adi"] . '" class="film-image">';
                    echo '<div class="film-info">';
                    echo '<h2 class="film-title">' . $row["film_adi"] . '</h2>';
                    echo '<p class="film-description">' . $row["film_aciklama"] . '</p>';
                    echo '<a href="bilet.php?film_id=' . $row["film_id"] . '">';
                    echo '<button class="watch-button">İzle</button>';
                    echo '</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "Veritabanında film bulunamadı.";
            }
            $baglanti->close();
            ?>
        </div>

      
        <div class="slider-container">
            <div class="slider">
                <?php
                
                $servername = "localhost";
                $username = "root"; 
                $password = ""; 
                $dbname = "filmoloji"; 

                
                $baglanti = new mysqli($servername, $username, $password, $dbname);

               
                if ($baglanti->connect_error) {
                    die("Veritabanına bağlanırken hata oluştu: " . $baglanti->connect_error);
                }

                
                $sql = "SELECT * FROM resimler";
                $result = $baglanti->query($sql);

                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<img src="' . $row["resim_yolu"] . '" alt="' . $row["baslik"] . '">';
                    }
                } else {
                    echo "Veritabanında resim bulunamadı.";
                }

                
                $baglanti->close();
                ?>
            </div>
            
            <button class="slider-arrow left">&#10094;</button>
            <button class="slider-arrow right">&#10095;</button>
            
            <div class="slider-indicators">
                <button class="active"></button>
                <button></button>
                <button></button>          
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sliderContainer = document.querySelector('.slider-container');
            var slider = document.querySelector('.slider');
            var sliderImages = document.querySelectorAll('.slider img');
            var nextButton = document.querySelector('.slider-arrow.right');
            var prevButton = document.querySelector('.slider-arrow.left');
            var indicators = document.querySelectorAll('.slider-indicators button');

            var currentIndex = 0;
            var intervalTime = 5000; 
            var slideInterval;

            
            function startSlider() {
                slideInterval = setInterval(nextSlide, intervalTime);
            }

            
            function nextSlide() {
                currentIndex++;
                if (currentIndex >= sliderImages.length) {
                    currentIndex = 0;
                }
                changeSlide();
            }

            
            function prevSlide() {
                currentIndex--;
                if (currentIndex < 0) {
                    currentIndex = sliderImages.length - 1;
                }
                changeSlide();
            }


            function changeSlide() {
                slider.style.transform = 'translateX(' + (-currentIndex * 100) + '%)';
                updateIndicators();
            }

            
            function updateIndicators() {
                indicators.forEach(function(indicator, index) {
                    indicator.classList.toggle('active', index === currentIndex);
                });
            }

            
            nextButton.addEventListener('click', function() {
                clearInterval(slideInterval);
                nextSlide();
                startSlider();
            });

            prevButton.addEventListener('click', function() {
                clearInterval(slideInterval);
                prevSlide();
                startSlider();
            });

            
            indicators.forEach(function(indicator, index) {
                indicator.addEventListener('click', function() {
                    clearInterval(slideInterval);
                    currentIndex = index;
                    changeSlide();
                    startSlider();
                });
            });

            
            startSlider();
        });
    </script>
</body>
</html>
