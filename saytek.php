<!DOCTYPE html>
<html>
<head>
	<title>Saytek Liste - HsN</title>

<style>
p.sansserif {
    font-family: Arial, Helvetica, sans-serif;
}
</style>


</head>
<body background="#e8e8e8">

<table align="center" bgcolor="#e8e8e8">
	<tr>
		<td>
<?php
// combobox içeriği -   program isimleri
$conn=mysql_connect("localhost","root","");
$db=mysql_select_db("saytek");
mysql_query("SET NAMES UTF8");

$sql=mysql_query("select distinct program_adi from tablo order by program_adi asc");

?>

<form action="" method="post">
	<select name="sec">

<?php
while ($menucek=mysql_fetch_array($sql)){
?>

		<option><?php echo $menucek['program_adi'];?></option>

<?php	

}

// combobox sonu - 
?>
	</select>
	<input type="submit" value="G Ö N D E R">
</form>

<form action="saytekgonder.php">
<input type="submit" value="Gösterim Sayılarına Göre Listele">
</form>

<p class="sansserif">
<?php

if($_POST){
$secilen=$_POST["sec"];
}
else{
$secilen="";	

}
echo "SEÇİLEN KAYIT : ".$secilen;
echo"<br>";
//seçilenin kayıt sayısını bulmak için
$sql2=mysql_query("select * from tablo where program_adi=('$secilen')");
$num_rows = mysql_num_rows($sql2);
echo "KAYIT SAYISI :"."$num_rows";
echo "<br>";

?>

</p>
	</td>
</tr>
<tr>
	<td bgcolor="#FFDAB9">



<?php
//seçileni listeleme
$sql3=mysql_query("select * from tablo where program_adi=('$secilen')");
echo "<p class='sansserif'>";

while ($menu=mysql_fetch_assoc($sql3)) {
	echo $menu["tarih"]." - ".$menu["saat"]." - ".$menu["program_adi"]." - ".$menu["bolum"]."<br>";
}
?>
</p>
</td>
</tr>
</table>

</body>
</html>