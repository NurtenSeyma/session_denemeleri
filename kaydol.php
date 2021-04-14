<?php
if (isset($_POST["kaydol"])) 
{
	$ad = strip_tags($_POST["ad"]);
$soyad = strip_tags($_POST["soyad"]);
$email= strip_tags($_POST["email"]);
$sifre = strip_tags($_POST["sifre"]);
$sifre_tkr = strip_tags($_POST["sifre_tkr"]);
$d_Tarihi = strip_tags($_POST["d_Tarihi"]);
$cinsiyet = strip_tags($_POST["cinsiyet"]);
$dosya = "kullanicilar.txt";
$ip = $_SERVER["REMOTE_ADDR"];
$kayit_zamani = date("d/m/Y"); 

$birlestir = "\n".$ad.";".$soyad.";".$cinsiyet.";".$d_Tarihi.";".$email.";".$sifre.";".$ip.";".$kayit_zamani;
if ($sifre==$sifre_tkr) 
{
	if (file_exists($dosya)) 
	{
		$oku = fopen($dosya, "r");
		while (!feof($dosya)) 
		{
			$satir = fgets($oku);
			$dizi = explode(";",$satir);
			if ($dizi[4]==$email && $dizi[5]==$sifre) 
			{
				$varmi = 1;
				break;
			}
		}
		if ($varmi==1) 
		{
			echo "Böyle bir kulllanıcı zaten mevcut...";
		}
		else
		{
			$yaz = fopen($dosya, "a");
		fwrite($yaz, $birlestir);
		fclose($yaz);
		echo "Tebrikler kaydınız oluşmuştur giriş yapabilirsiniz.<br><br>";
		echo "<a href=index.html>Anasayfaya dönmek için tıklayın...</a><br><br>";
		}
	}
	else
	{
		$yaz = fopen($dosya, "a");
		fwrite($yaz, $birlestir);
		fclose($yaz);
		echo "Tebrikler kaydınız oluşmuştur giriş yapabilirsiniz.<br><br>";
		echo "<a href=index.html>Anasayfaya dönmek için tıklayın...</a><br><br>";
	}
}
else
{
	echo "Şifreler eşleşmiyor...";
}
}
else
{
	echo "Lütfen önce formu doldurun...";
	echo "<a href='index.html'>Anasayfa</a>";
}

?>