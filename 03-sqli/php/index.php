<?php 
include('db.php');

if(isset($_GET['genre'])) {
	$result = mysql_query("SELECT * FROM movies WHERE genre = '".$_GET['genre']."'");  
}
else { //No category selected
	$result = mysql_query("SELECT * FROM movies");  
}

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
<div class="menu"><i>Action movies for everyone...</i> | Genre: <a href="?genre=action">Action</a> / <a href="?genre=science fiction">Science-Fiction</a></div>
<hr color="white"/>

<table class="list_films">

<?php

//for($i = 1; $i <= 4; $i++)

///while($row = mysql_fetch_array( $result ))
///{


$rows = $result->fetchAll();
foreach ($rows as $row)
{
	

	echo '
<tr><td class="border_film">
</td>
<td class="film_infos">

<h3><a href="movie_detail.php?id='.$row['id'].'">'.$row['title'].'</a></h3>
<p>Genre: '.$row['genre'].'<br/>
Year: '.$row['year'].'<br/></p>

</td>
<td class="border_film">
</td>
</tr>';
}



?>


</table>

<hr color="white"/>

</center>
</div>



<!-- <?php print_r($result); ?> -->
<!-- <?php print_r($rows); ?> -->

</body>
</html>