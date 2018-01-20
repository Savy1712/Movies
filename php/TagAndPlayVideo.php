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
$fill_up = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $movie_name = htmlspecialchars($_POST["movie_name"]);
  $movie_path = htmlspecialchars($_POST["movie_path"]);
  $language = htmlspecialchars($_POST["Language"]);
  $genre = htmlspecialchars($_POST["Genre"]);
  if($movie_name == "") {
    $movie_name = "TAG MOVIE";
    $fill_up = True;
  }
}
?>	 


<script  src="/Movies/js/Movie.js"> </script>
</head>

<div class = "Enclose">
<table>
<tr>
<td><input type="button" title="Play the movie" name="play_movie" value=""  class='PlayMovieIn' onclick="" style="background-image:url('<?php echo $DEFAULT_LOCATION.'play1.png'; ?>')"  /> </td>
<td width="100%"> <div id = "SideHeadings" title="Name of the Movie"><?php echo strtoupper($movie_name); ?></div> </td>
<td width="20%"><input type="button" name="close_movie" value="" class="Exit" onclick="Close()"  style="background-image:url('<?php echo $DEFAULT_LOCATION.'home1.png'; ?>')" title="Go To Home"></td>
</tr>
</table>
</div>



<body>
<div id = "Innerrectangle">
<?php 

/* Absence of Info.text file makes to come into this compartment */
if ($fill_up == True) { 
?>
  <table width='100%'>
  <tr>
  <td width="10%" id="TagBox"><b> MOVIE NAME </b> <img src= "<?php echo $DEFAULT_LOCATION.'like.png'; ?>" width="50px" height="50px" id="SelectShowName"></img> </td>
  <td width="60%"><div id="InnerRectTextBox"><input class="TextBox" type="text" id="MovieName" placeholder="Enter the name of movie here..." onkeypress="NameInitiate()">
 <?php 
   if($fill_up == True) {
     $movie_list = explode("/", $movie_path); 
     $title =  $movie_list[count($movie_list)-1];  
 ?>
  <img src= "<?php echo $DEFAULT_LOCATION. 'hint.png'; ?>" width="50px" height="50px" title="*HINT : Choose suitable name using '<?php echo $title ; ?>' " />

<?php } ?>
  </input>
  </div></td>
  </tr>
  </table>


  <table width='100%'>
  <tr>
  <td width="10%" id="TagBox"><b> MOVIE  YEAR </b>  <img src= "<?php echo $DEFAULT_LOCATION.'like.png'; ?>" width="50px" height="50px" id="SelectShowYear"></img></td>
  <td width="60%">
  <div id="InnerRectTextBox">
    <?php 
      $old_year = 1950;
      $current_year = date('Y');
      echo "<select id='MovieYear' class='TextBox' onchange='YearInitiate()' onkeypress='YearInitiate()'>";
      foreach(range($current_year, $old_year) as $i):
        echo "<option> $i </option>"; 
      endforeach;
      echo "</select>";   
    ?>
  </div>
  </td>
  <input type="hidden" id="FillUpInfo" value="" />
  </tr>
  </table>

<?php
}
?>

<table width="100%">
<tr class="InfoTable">
<td width="10%" id = "TagBox"> <b>GENRE</b><br>
<img src= "<?php echo $DEFAULT_LOCATION.'like.png'; ?>" width="50px" height="50px" id="SelectShowGenre"></img></td>
</td>

<td>
<div id = "InnerRectBox">
<input type="hidden" name="Genre" id="Genre" value="" />
<table class="GenreTable">
<tr>
<td><input type="button" title="Horror" name="Horror" style="background-image:url('<?php echo $GENRE_IMAGES.'horror.png'; ?>')" class="GenrePics" onclick="GenreClick('Horror');" id="Horror" /></td>
<td><input type="button"  title="Romance" name="Romance" style="background-image:url('<?php echo $GENRE_IMAGES.'Romance.jpeg'; ?>')" class="GenrePics" onfocus="highlight('Romance');" id="Romance" onclick="GenreClick('Romance');" /></td>
<td><input type="button"  title="Action" name="Action" style="background-image:url('<?php echo $GENRE_IMAGES.'Action.jpeg'; ?>')" class="GenrePics" onclick="GenreClick('Action');" id="Action" /></td>
<td><input type="button" title="Fantasy" name="Fantasy" style="background-image:url('<?php echo $GENRE_IMAGES.'fantasy.jpg'; ?>')" class="GenrePics" onclick="GenreClick('Fantasy');" id="Fantasy" /></td>
<td><input type="button" title="Musical"  name="Musical" style="background-image:url('<?php echo $GENRE_IMAGES.'Musical.jpeg'; ?>')" class="GenrePics" onclick="GenreClick('Musical');" id="Musical"/></td>
<td><input type="button" title="Mystery" name="Mystery" style="background-image:url('<?php echo $GENRE_IMAGES.'Mystery.jpeg'; ?>')" class="GenrePics" onclick="GenreClick('Mystery');" id="Mystery"/></td>
<td><input type="button" title="Scifi"  name="Scifi" style="background-image:url('<?php echo $GENRE_IMAGES.'Scifi.jpeg'; ?>')" class="GenrePics" onclick="GenreClick('Scifi');" id="Scifi"/></td>
<td><input type="button" title="Thriller" name="Thriller" style="background-image:url('<?php echo $GENRE_IMAGES.'Thriller.png'; ?>')" class="GenrePics" onclick="GenreClick('Thriller');" id="Thriller"/></td>
<td><input type="button" title="Western" name="Western" style="background-image:url('<?php echo $GENRE_IMAGES.'Western.jpeg'; ?>')" class="GenrePics" onclick="GenreClick('Western');" id="Western"/></td>
</tr>
</table>
</div>
</td>
</tr>
<tr>
<td id = "TagBox" width="10%"><b> LANGUAGE </b><br>
<img src= "<?php echo $DEFAULT_LOCATION.'like.png'; ?>" width="50px" height="50px" id="SelectShowLanguage" ></img></td>
<td>

<div id = "InnerRectBox">
<input type="hidden" name="Lang" id="Lang" value="" /> 
<table class="GenreTable">
<tr>




<td><input type="button" title="English" name="english" value="ENGLISH" class="Language" onclick="LanguageClick('english');" id="english"></td>
<td><input type="button" title="Tamil" name="tamil" value="TAMIL" class="Language" onclick="LanguageClick('tamil');" id="tamil"></td>
<td><input type="button" title="Telugu" name="telugu" value="TELUGU" class="Language" onclick="LanguageClick('telugu');" id="telugu"></td>
<td><input type="button" title="Malayalam" name="malayalam" value="MALAYALAM" class="Language" onclick="LanguageClick('malayalam');" id="malayalam"></td>
<td><input type="button"  title="Hindi" name="hindi" value="HINDI" class="Language" onclick="LanguageClick('hindi');" id="hindi"></td>

</tr>
</table>
</div>

</td>
</tr>
</table>

</div>


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

</body>
</html>
