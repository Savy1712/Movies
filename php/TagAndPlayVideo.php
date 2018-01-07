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
  # Add POST statements regarding the language and Genre 
}
?>	 

<script  src="/Movies/js/Movie.js"> </script>
</head>

<div id = "SideHeadings"><?php echo "$movie_name"; ?> </div>

<body>


<div id = "InnerBox" >
<div id = "TagBox"> CHOOSE GENRE:</div>
<table>
<tr>
<td><input type="button" name="Horror" style="background-image:url('<?php echo $GENRE_IMAGES.'horror.png'; ?>')" class="GenrePics" onclick="Close()" autofocus /></td>
<td><input type="button" name="Romance" style="background-image:url('<?php echo $GENRE_IMAGES.'Romance.jpeg'; ?>')" class="GenrePics" onfocus="highlight('Romance');" id="Romance" /></td>
<td><input type="button" name="Action" style="background-image:url('<?php echo $GENRE_IMAGES.'Action.jpeg'; ?>')" class="GenrePics" /></td>
<td><input type="button" name="Fantasy" style="background-image:url('<?php echo $GENRE_IMAGES.'fantasy.jpg'; ?>')" class="GenrePics"/></td>
<td><input type="button" name="Musical" style="background-image:url('<?php echo $GENRE_IMAGES.'Musical.jpeg'; ?>')" class="GenrePics"/></td>
<td><input type="button" name="Mystery" style="background-image:url('<?php echo $GENRE_IMAGES.'Mystery.jpeg'; ?>')" class="GenrePics"/></td>
<td><input type="button" name="Scifi" style="background-image:url('<?php echo $GENRE_IMAGES.'Scifi.jpeg'; ?>')" class="GenrePics"/></td>
<td><input type="button" name="Thriller" style="background-image:url('<?php echo $GENRE_IMAGES.'Thriller.png'; ?>')" class="GenrePics"/></td>
<td><input type="button" name="Western" style="background-image:url('<?php echo $GENRE_IMAGES.'Western.jpeg'; ?>')" class="GenrePics"/></td>
</tr>
</table>
</div>


<div id = "InnerBox">
<div id = "TagBox">CHOOSE LANGUAGE:</div>
<div id ="Centering">
<table>
<tr>
<td><input type="button" name="" value="ENGLISH" class="Language"></td>
<td><input type="button" name="" value="TAMIL" class="Language"></td>
<td><input type="button" name="" value="TELUGU" class="Language"></td>
<td><input type="button" name="" value="MALAYALAM" class="Language"></td>
<td><input type="button" name="" value="HINDI" class="Language"></td>

</tr>
</table>
</div>
</div>

<div id = "hidebox">
<div id="InnerBox">
<div id ="ValueBox">
<?php 
$like_image_path = str_replace("Videos/", "", $FILE_LOCATION).'Default/like.png'; 
?>
<div id="Para"><p align="center"><img src="<?php echo $like_image_path ?>" width="50" height="50" ></p></img></div> 
<div id="Para"><p align="center">THANKS FOR THE HELP</p></div></td>
</div>
</div> 
</div>

<div id = "TagBox">
<input type="button" name="close_movie" value="EXIT" class="Exit" onclick="Close()" />
<input type="button" name="play_movie" value="PLAY MOVIE" class='PlayMovie' onclick="" />
<input type="button" name="close_movie" value="SAVE & CLOSE" class="SaveNClose" onclick="Close()" />

</div>


</body>
</html>

