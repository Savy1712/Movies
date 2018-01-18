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
$language = "";
$genre = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $movie_name = htmlspecialchars($_POST["movie_name"]);
  $movie_path = htmlspecialchars($_POST["movie_path"]);
  $language = htmlspecialchars($_POST["Language"]);
  $genre = htmlspecialchars($_POST["Genre"]);
}
?>	 


<script  src="/Movies/js/Movie.js"> </script>
</head>

<div class = "Enclose">
<table>
<tr>
<td><input type="button" title="Play the movie" name="play_movie" value=""  class='PlayMovieIn' onclick="" style="background-image:url('<?php echo $DEFAULT_LOCATION.'play1.png'; ?>')"  /></td>
<td width="100%"> <div id = "SideHeadings" title="Name of the Movie"><?php echo "$movie_name"; ?></div> </td>
<td width="20%"><input type="button" name="close_movie" value="" class="Exit" onclick="Close()"  style="background-image:url('<?php echo $DEFAULT_LOCATION.'home1.png'; ?>')" title="Go To Home"></td>
</tr>
</table>
</div>



<body>
<div id = "Innerrectangle">

<table width="100%">
<tr class="InfoTable">
<td id="TagBox"> CHOOSE GENRE
<img src= "<?php echo $DEFAULT_LOCATION.'like.png'; ?>" width="50px" height="50px" id="SelectShowGenre"></img></td>
</td>

<td>
<div id = "InnerRectBox">
<input type="hidden" name="Genre" id="Genre" value="" />
<table class="GenreTable">
<tr>
<td><input type="button" name="Horror" style="background-image:url('<?php echo $GENRE_IMAGES.'horror.png'; ?>')" class="GenrePics" onclick="GenreClick('Horror');" id="Horror" /></td>
<td><input type="button" name="Romance" style="background-image:url('<?php echo $GENRE_IMAGES.'Romance.jpeg'; ?>')" class="GenrePics" onfocus="highlight('Romance');" id="Romance" onclick="GenreClick('Romance');" /></td>
<td><input type="button" name="Action" style="background-image:url('<?php echo $GENRE_IMAGES.'Action.jpeg'; ?>')" class="GenrePics" onclick="GenreClick('Action');" id="Action" /></td>
<td><input type="button" name="Fantasy" style="background-image:url('<?php echo $GENRE_IMAGES.'fantasy.jpg'; ?>')" class="GenrePics" 
onclick="GenreClick('Fantasy');" id="Fantasy" /></td>
<td><input type="button" name="Musical" style="background-image:url('<?php echo $GENRE_IMAGES.'Musical.jpeg'; ?>')" class="GenrePics" onclick="GenreClick('Musical');" id="Musical"/></td>
<td><input type="button" name="Mystery" style="background-image:url('<?php echo $GENRE_IMAGES.'Mystery.jpeg'; ?>')" class="GenrePics"
 onclick="GenreClick('Mystery');" id="Mystery"/></td>
<td><input type="button" name="Scifi" style="background-image:url('<?php echo $GENRE_IMAGES.'Scifi.jpeg'; ?>')" class="GenrePics" onclick="GenreClick('Scifi');" id="Scifi"/></td>
<td><input type="button" name="Thriller" style="background-image:url('<?php echo $GENRE_IMAGES.'Thriller.png'; ?>')" class="GenrePics" onclick="GenreClick('Thriller');" id="Thriller"/></td>
<td><input type="button" name="Western" style="background-image:url('<?php echo $GENRE_IMAGES.'Western.jpeg'; ?>')" class="GenrePics" onclick="GenreClick('Western');" id="Western"/></td>
</tr>
</table>
</div>
</td>
</tr>
<tr>
<td id = "TagBox"> CHOOSE LANGUAGE 

<img src= "<?php echo $DEFAULT_LOCATION.'like.png'; ?>" width="50px" height="50px" id="SelectShowLanguage" ></img></td>


<td>
<div id = "InnerRectBox">
<input type="hidden" name="Lang" id="Lang" value="" /> 
<table class="GenreTable">
<tr>
<td><input type="button" name="english" value="ENGLISH" class="Language" onclick="LanguageClick('english');" id="english"></td>
<td><input type="button" name="tamil" value="TAMIL" class="Language" onclick="LanguageClick('tamil');" id="tamil"></td>
<td><input type="button" name="telugu" value="TELUGU" class="Language" onclick="LanguageClick('telugu');" id="telugu"></td>
<td><input type="button" name="malayalam" value="MALAYALAM" class="Language" onclick="LanguageClick('malayalam');" id="malayalam"></td>
<td><input type="button" name="hindi" value="HINDI" class="Language" onclick="LanguageClick('hindi');" id="hindi"></td>

</tr>
</table>
</div>

</td>
</tr>
</table>

<table id = "SaveEnclose" ><tr>
<td>
<img src= "<?php echo $DEFAULT_LOCATION.'save.ico'; ?>" class="ImgSave" ></img>
</td>

<td>
<input type="button" name="close_movie" value="SAVE" class="SaveNClose" 
onclick="SaveGenreLanguage('<?php echo $movie_path; ?>')" title="Save the changes made and close this window" id="save"  /></td>
</td>
</tr></table>
<div id = "FileWrite"></div>

</div>
</body>
</html>
