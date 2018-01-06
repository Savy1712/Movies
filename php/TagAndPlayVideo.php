<?php
include "Paths.php"
?>

<html lang="en">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link type="text/css" rel="stylesheet" href="/Movies/css/style.css">

<?php 
$movie_path = "";
$movie_name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $movie_name = htmlspecialchars($_POST["movie_name"]);
  $movie_path = htmlspecialchars($_POST["movie_path"]);
  //echo $movie_name;
}
?>	 

<script  src="/Movies/js/Movie.js"> </script>
</head>

<div id = "SideHeadings"><?php echo $movie_name ?> </div>

<body>
<div id = "InnerBox">
<div id = "TagBox"> GENRE:</div>
<select id="Genre" name="Genre" class="TagMovie" onchange="SayThanks()">
  <option value = "dontknow">DONT KNOW</option>
  <option value = "Comedy">COMEDY</option>
  <option value = "Horror">HORROR</option>
  <option value = "Comical_horror">COMEDY & HORROR</option>
  <option value = "Thriller">THRILLER</option>
  <option value = "Sci-fi">SCI-FI</option>
  <option value = "Drama">DRAMA</option>
  <option value = "Psycho">PSYCHOPATH</option>
</select>
</div>

<div id = "InnerBox">
<div id = "TagBox">
LANGUAGE:</div>
<select id="Language" name="Language" class="TagMovie" onchange="SayThanks()">
  <option value = "dontknow"> DONT KNOW </option>
  <option value = "Tamil">TAMIL</option>
  <option value = "English">ENGLISH</option>
  <option value = "Hindi">HINDI</option>
  <option value = "Malayalam">MALAYALAM</option>
  <option value = "Telugu">TELUGU</option>
</select>
</div>

<div id = "hidebox">
<div id="InnerBox">
<div id ="ValueBox">
<?php 
$like_image_path = str_replace("Videos/", "", $FILE_LOCATION).'Default/like.png'; 
?>
<table align="center">
<tr>
<td align="center"><img src="<?php echo $like_image_path ?>" width="100" height="100"></img></td> 
<td class="Boxed"><div id="Para">THANKS FOR THE HELP</div></td>
</tr></table>
</div>
</div> 
</div>

<div id = "TagBox">
<input type="button" name="play_movie" value="PLAY MOVIE" class='PlayMovie' onclick="" />
<input type="button" name="close_movie" value="CLOSE WINDOW" class="PlayMovie" onclick="Close()" />
</div>


</body>
</html>

