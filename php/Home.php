<!DOCTYPE HTML> 
<?php
include "Paths.php";
?>

<html lang="en">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link type="text/css" rel="stylesheet" href="/Movies/css/style.css">

<script  src="/Movies/js/Movie.js"> </script>
</head>


<div id = "SideHeadings"> MOVIES  </div>

<body>

<?php 
$i = 0;
$file_path = "/Movies/Videos/Movies_2015/Billa_2015/";
$movie_name = "Billa_2015.mp4";

$movie_path= $file_path . $movie_name;
$dir = file_get_contents($HOME_FOLDER.$file_path."Info.txt");
$dir_list = explode(';', $dir);
$total_count = count(explode(';',$dir)) - 1;

# File name 
$file_name = explode('=', $dir_list[0])[1];
$image_file_name = $file_path.'Image.png';


echo "<div id='InnerBox'>";  

echo "<table id='MovieList' >";
echo "<tr>";
echo "<td>";
echo "<div id ='SquareBox'>";
echo "<div id ='Straightline'></div>";
echo "<div id ='InnerSquareHeading'>";
echo $file_name."</div>";
echo "<div id='InnerSquare'>";
echo "<img src=".$image_file_name." width='200' height='200'></img>";
echo "</div>";
echo "<input type='button' name='play_movie' value='PLAY MOVIE' class='PlayMovie' onclick=MoviePlay('$movie_path') />";
echo "</div>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
?>

</body>
</html>

