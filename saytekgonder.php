<!DOCTYPE html>
<html>
<head>
	<title>Saytek Listesi</title>
</head>
<body>

<style>
p.sansserif {
    font-family: Arial, Helvetica, sans-serif;
}
</style>
</body>
</html>


<table align="center">
<tr>
	<td>
<link rel="stylesheet" type="text/css" href="css.css" media="all">

<div class="menu"></div>

<p class="sansserif">
<?php

$conn=mysql_connect("localhost","root","");
$db=mysql_select_db("saytek");
mysql_query("SET NAMES UTF8");

$sql=mysql_query("select program_adi,tarih, count(*) as sayi from tablo group by program_adi order by count(*)");

while ($listele=mysql_fetch_array($sql)){
echo $listele["sayi"]. " - ".$listele["program_adi"]. " - ".$listele["tarih"];

echo "<br>";
}

?>
</p>
	</td>
</tr>
</table>

</html>