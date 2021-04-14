<?php
session_start();
echo "Gezilen sayfa sayısı: {$_SESSION['sayfa_sayisi']}";
session_destroy();
echo "<a href='index.html'>Anasayfa</a>";
?>