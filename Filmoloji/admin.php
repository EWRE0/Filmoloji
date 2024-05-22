<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmoloji Admin Paneli</title>
    <style>

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: #00233a;
            color: #f0f0f0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 20px;
        }
        h1 {
            text-align: center;
            color: #f0f0f0;
            margin-bottom: 30px;
        }

        .user-container, .ticket-container, .film-container, .image-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 20px;
        }
        .user-card, .ticket-card, .film-card, .image-card {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            transition: transform 0.3s ease;
        }
        .user-card:hover, .ticket-card:hover, .film-card:hover, .image-card:hover {
            transform: translateY(-5px);
        }
        .user-info, .ticket-info, .film-info, .image-info {
            padding: 20px;
            color: #333;
        }
        .user-title, .ticket-title, .film-title, .image-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .user-description, .ticket-description, .film-description, .image-description {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }
        .film-image, .image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .ticket-card .film-image {
            order: -1;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Filmoloji Admin Paneli</h1>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "filmoloji";

        
        $baglanti = new mysqli($servername, $username, $password, $dbname);

        
        if ($baglanti->connect_error) {
            die("Bağlantı hatası: " . $baglanti->connect_error);
        }

        /
        $users_sql = "SELECT id, username FROM users";
        $users_result = $baglanti->query($users_sql);

        
        $tickets_sql = "SELECT * FROM kullanici_secimleri";
        $tickets_result = $baglanti->query($tickets_sql);

        
        $films_sql = "SELECT * FROM filmler";
        $films_result = $baglanti->query($films_sql);

        
        $images_sql = "SELECT * FROM resimler";
        $images_result = $baglanti->query($images_sql);
        ?>

        <h2>Kayıt Olmuş Kullanıcılar</h2>
        <div class="user-container">
            <?php if ($users_result->num_rows > 0): ?>
                <?php while($user = $users_result->fetch_assoc()): ?>
                    <div class="user-card">
                        <div class="user-info">
                            <div class="user-title">ID: <?php echo $user["id"]; ?></div>
                            <div class="user-description">Kullanıcı Adı: <?php echo $user["username"]; ?></div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="user-info">Kayıtlı kullanıcı yok.</div>
            <?php endif; ?>
        </div>

        <h2>Satın Alınmış Biletler</h2>
        <div class="ticket-container">
            <?php if ($tickets_result->num_rows > 0): ?>
                <?php while($ticket = $tickets_result->fetch_assoc()): ?>
                    <div class="ticket-card">
                        <?php
                        
                        $film_resim_sql = "SELECT film_resim FROM filmler WHERE film_adi = '" . $ticket["film"] . "'";
                        $film_resim_result = $baglanti->query($film_resim_sql);

                        if ($film_resim_result->num_rows > 0) {
                            $film_resim_row = $film_resim_result->fetch_assoc();
                            $film_resim = $film_resim_row["film_resim"];
                            echo '<img src="' . $film_resim . '" alt="' . $ticket["film"] . '" class="film-image">';
                        }
                        ?>
                        <div class="ticket-info">
                            <div class="ticket-title">Bilet ID: <?php echo $ticket["id"]; ?></div>
                            <div class="ticket-description">Kullanıcı Adı: <?php echo $ticket["username"]; ?></div>
                            <div class="ticket-description">Film: <?php echo $ticket["film"]; ?></div>
                            <div class="ticket-description">Koltuk: <?php echo $ticket["koltuk"]; ?></div>
                            <div class="ticket-description">Saat: <?php echo $ticket["saat"]; ?></div>
                            <div class="ticket-description">Satın Alma Saati: <?php echo $ticket["satin_alma_saati"]; ?></div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="ticket-info" style="color: white;">Satın alınmış bilet yok.</div>
            <?php endif; ?>
        </div>

        <h2>Eklenen Filmler</h2>
        <div class="film-container">
            <?php if ($films_result->num_rows > 0): ?>
                <?php while($film = $films_result->fetch_assoc()): ?>
                    <div class="film-card">
                        <img src="<?php echo $film["film_resim"]; ?>" alt="<?php echo $film["film_adi"]; ?>" class="film-image">
                        <div class="
                        film-info">
                            <div class="film-title"><?php echo $film["film_adi"]; ?></div>
                            <div class="film-description"><?php echo $film["film_aciklama"]; ?></div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="film-info">Eklenmiş film yok.</div>
            <?php endif; ?>
        </div>

        <h2>Resimler</h2>
        <div class="image-container">
            <?php if ($images_result->num_rows > 0): ?>
                <?php while($image = $images_result->fetch_assoc()): ?>
                    <div class="image-card">
                        <img src="<?php echo $image["resim_yolu"]; ?>" alt="<?php echo $image["resim_adi"]; ?>" class="image">
                        <div class="image-info">
                            <div class="image-title"><?php echo $image["baslik"]; ?></div>
                            <div class="image-description"><?php echo $image["aciklama"]; ?></div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="image-info">Eklenmiş resim yok.</div>
            <?php endif; ?>
        </div>

        <?php $baglanti->close(); ?>
    </div>
</body>
</html>
