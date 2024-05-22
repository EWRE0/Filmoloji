<?php
session_start();

// Oturumu temizleme işlemi
session_unset();
session_destroy();

// Ana sayfaya yönlendirme
header("Location: homepage.php");
exit;
?>
