<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/screen.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/buttons.css" type="text/css" media="screen">
</head>


<?php
include ("auth.php");
include("config.php");
?>
<html>

<center><img src="images/ftpl.png">
<h2>__________________________________________________________</h2>


<?php


if (! $connect) die(mysql_error());
mysql_select_db($dbname , $connect) or die("Couldn't open $db: ".mysql_error());
$result = mysql_query( "SELECT * FROM  `ftp`" )
          or die("SELECT Error: ".mysql_error());
$num_rows = mysql_num_rows($result);
print "<center>There are $num_rows <b>FTP's</b> found.<br>";

//print "[][][][][][][][][][][][][][][][][][][][][][][][][][][][]<h1>Bots</h1>";
while ($get_info = mysql_fetch_row($result)){
echo "<table border='1'>
<tr>
<th>IP : PORT</th>
<th>UID</th>
</tr>";
echo "<tr>";
foreach ($get_info as $field)
print "<td> $field </td>";
echo "</tr>";

}
echo "</table>";
mysql_close($connect);


////('a.php');
?>