<?php
if (isset($_POST["giris"]))
{
	$email = strip_tags($_POST["email"]);
$sifre = strip_tags($_POST["sifre"]);
$dosya = "kullanicilar.txt";

if (file_exists($dosya)) 
{
	$oku = fopen($dosya, "r");
	$varmi = 0;
	while (!feof($oku)) 
	{
	   $satir = fgets($oku);
	   $dizi = explode(";",$satir);
	   if ($dizi[4]==$email && $dizi[5]==$sifre) 
	   {
	   	 session_start();
	   	 $_SESSION["ad"] = $dizi[0];
	   	 $_SESSION["soyad"] = $dizi[1];
	   	 $_SESSION["cinsiyet"] = $dizi[2];
	   	 $_SESSION["d_Tarihi"] = $dizi[3];
	   	 $_SESSION["email"] = $dizi[4];
	   	 $_SESSION["sifre"] = $dizi[5];
	   	 $_SESSION["ip"] = $dizi[6];
	   	 $_SESSION["kayit_zamani"] = $dizi[7];
	   	 $_SESSION["sayfa_sayisi"] = 0;
         
         echo "Hoş geldin {$_SESSION['ad']}<br><br>";
         echo "<a href='sayfa1.php'>Sayfa 1</a><br><br>";
         echo "<a href='sayfa2.php'>Sayfa 2</a><br><br>";
         echo "<a href='sayfa3.php'>Sayfa 3</a><br><br>";
         echo "<a href='sayfa4.php'>Sayfa 4</a><br><br>";
         echo "<a href='cikis.php'>Çıkış Yap</a><br><br>";
         $varmi = 1;
         break;
	   }
	}
	if ($varmi==0) 
	{
		echo "Böyle bir kullanıcı bulunamadı...";
	}
}
else
{
	echo "Sistemde hiç kullanıcı yok, Lütfen önce kaydolun!";
}
}
else
{
	echo "Lütfen önce formu doldurun...<br><br>";
	echo "<a href='index.html'>Anasayfa</a>";
}

?>