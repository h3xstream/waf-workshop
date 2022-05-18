<?php 
include('db.php');

$idMovie = isset($_GET['id']) ? $_GET['id'] : -1;

//$query = "SELECT * FROM movies WHERE id = '".mysql_real_escape_string($idMovie)."'";
$query = "SELECT * FROM movies WHERE id = ".$idMovie." AND public = true";
$result = mysql_query($query) or die(mysql_error());  

?><html>
<head>
<title>Super Movie Database</title>

<link href='http://fonts.googleapis.com/css?family=Paytone+One&v1' rel='stylesheet' type='text/css'>
<link rel="StyleSheet" href="style.css"></link>

</head>
<body>

<div id="container"><center>
<h1>Super Movie Database</h1>
<hr color="white"/>
<div class="menu"><a href="index.php">Back to movies listing</a></div>
<hr color="white"/>

<table class="list_films">

<tr><td class="border_film">
</td>
<td class="film_infos" style="width:400px;padding:10px">

<?php
//if($row = mysql_fetch_array( $result ))
//{
$rows = $result->fetchAll();
if(count($rows) > 0)
{
	$row = $rows[0];
	echo '
<h3>'.$row['title'].'</h3>

<div style="float:left;margin-right:5px"><img src="cover/'.$row['cover'].'"/></div>

<p>'.$row['synopsis'].'</p>

<p>Genre: '.$row['genre'].'<br/>
Year: '.$row['year'].'<br/></p>


';


}
else {
	echo "No movie found or the details are not public yet.";
}
?>
</td>
<td class="border_film">
</td>
</tr>


</table>

<hr color="white"/>

</center>
</div>


<!-- <?php print_r($result); ?> -->
<!-- <?php print_r($rows); ?> -->

</body>
</html>