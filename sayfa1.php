<?php
session_start();
$_SESSION["sayfa_sayisi"]++;
echo "Hoş geldin {$_SESSION['ad']}";


?>
<h3>Sayfa 1</h3>
<br><br>

<a href="sayfa2.php">Sayfa2 </a><br><br>
<a href="sayfa3.php">Sayfa2 </a><br><br>
<a href="sayfa4.php">Sayfa2 </a><br><br>

<a href="cikis.php">Çıkış Yap </a><br><br>

