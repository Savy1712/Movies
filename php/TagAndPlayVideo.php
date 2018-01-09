<?php
include "Paths.php"
?>

<html lang="en">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link type="text/css" rel="stylesheet" href="/Movies/css/style.css">


<style>
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 1s;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}
</style>




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

<div id = "SideHeadings"><?php echo "$movie_name"; ?> </div>

<body>



<div id = "InnerBox" >
<input type="hidden" name="Genre" id="Genre" value="" />
<div id = "TagBox"> CHOOSE GENRE:</div>
<table>
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


<div id = "InnerBox">
<input type="hidden" name="Lang" id="Lang" value="" /> 
<div id = "TagBox"> CHOOSE LANGUAGE: </div>
<table class="LanguageBox">
<tr>
<td><input type="button" name="english" value="ENGLISH" class="Language" onclick="LanguageClick('english');" id="english"></td>
<td><input type="button" name="tamil" value="TAMIL" class="Language" onclick="LanguageClick('tamil');" id="tamil"></td>
<td><input type="button" name="telugu" value="TELUGU" class="Language" onclick="LanguageClick('telugu');" id="telugu"></td>
<td><input type="button" name="malayalam" value="MALAYALAM" class="Language" onclick="LanguageClick('malayalam');" id="malayalam"></td>
<td><input type="button" name="hindi" value="HINDI" class="Language" onclick="LanguageClick('hindi');" id="hindi"></td>

</tr>
</table>
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

<table>
<tr class="LanguageBox">
<td><input type="button" name="close_movie" value="EXIT" class="Exit" onclick="Close()"  title="Close without Saving" /></td>
<td><input type="button" name="play_movie" value="PLAY MOVIE" class='PlayMovieIn' onclick=""  /></td>
<td align="right"><input type="button" name="close_movie" value="SAVE & CLOSE" class="SaveNClose" 
onclick="SaveGenreLanguage('<?php echo $movie_path; ?>')" title="Save the changes made and close this window" id="save"/></td>
</tr>
</table>
<div id = "FileWrite"></div>

</body>
</html>
