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
  $image_file_path = explode("/", $movie_path);
  $image_file = str_replace($image_file_path[count($image_file_path)-1], "", $movie_path).'Image.png'; 
  $language = htmlspecialchars($_POST["Language"]);
  $genre = htmlspecialchars($_POST["Genre"]);
  if($movie_name == "") {
    $movie_name = "TAG MOVIE";
    $fill_up = True;
  }
}
?>	 

<input type="hidden" name="Genre" id="Genre" value="" />
<input type="hidden" name="Lang" id="Lang" value="" /> 



<script  src="/Movies/js/Movie.js"> </script>
</head>

<div class = "Enclose">
<table>
<tr>
<td><input type="button" title="Play the movie" name="play_movie" value=""  class='PlayMovieIn' onclick="" style="background-image:url('<?php echo $DEFAULT_LOCATION.'play1.png'; ?>')"  /></td>
<td width="100%"> <div id = "SideHeadings" title="Name of the Movie">
<?php echo strtoupper($movie_name); ?></div> </td>
<td width="20%"><input type="button" name="close_movie" value="" class="Exit" onclick="Close()"  style="background-image:url('<?php echo $DEFAULT_LOCATION.'home1.png'; ?>')" title="Go To Home"></td>
</tr>
</table>
</div>

  


<body>

<table class="Enclose">

<tr>

<td class="MoviePNG">
<img src="<?php echo $image_file; ?>" onclick="Close()"  title="GO TO HOME" class="<?php if($movie_name == "TAG MOVIE") { ?> MoviePNG_Tag <?php } else { ?> MoviePNG_Small <?php } ?>" />
</td>

<td width="100%">

<!-- For scrolling the main contents without moving the header & footer -->
 
<div id = "Innerrectangle">

<table class="TableTagFile">


<?php 
  
/* Absence of Info.text file makes to come into this compartment */
if ($fill_up == True) { 

?>
<input type="hidden" id="FillUpInfo" value="" />

<!-- Name Row -->
  <tr>
    <td class="TitleBox">MOVIE NAME
      <img src= "<?php echo $DEFAULT_LOCATION.'fblike.svg'; ?>" width="15px" height="15px" id="SelectShowName"></img>
    </td> 
  
    <td class="InnerRectTextBox">
      <input class="TextBox" type="text" id="MovieName" placeholder="Enter the name of movie here..."  onkeyup="NameInitiate()" />
    </td> 
      <?php 
        if($fill_up == True) {
          $movie_list = explode("/", $movie_path); 
          $title =  $movie_list[count($movie_list)-1];  
      ?> 
  

    <?php } ?>
    <td><img src= "<?php echo $DEFAULT_LOCATION. 'hint.png'; ?>" width="20px" height="20px" title="*HINT : Choose suitable name using '<?php echo $title ; ?>' " />
    </td>
  </tr>

<!-- Year Row -->
  <tr>
    <td class="TitleBox">MOVIE YEAR
      <img src= "<?php echo $DEFAULT_LOCATION.'fblike.svg'; ?>" width="15px" height="15px" id="SelectShowYear"></img>
    </td>
  
    <td class="InnerRectTextBox">
      <?php 
        $old_year = 1950;
        $current_year = date('Y');
        echo "<select id='MovieYear' class='TextBox' onchange='YearInitiate()' onkeypress='YearInitiate()'>";
        echo "<option> DONT KNOW </option>";
        foreach(range($current_year, $old_year) as $i):
          echo "<option> $i </option>"; 
        endforeach;
        echo "</select>";   
      ?>
    </td>
  </tr> 
  </table>
  <table class="TableTagFile"> 
<!-- Closing the PHP function for missing "Info.txt" file --> 
<?php
}
?>



  <!-- Genre Row -->
  <tr>
    <td class = "TitleBox"><div class="NameBoxTag">GENRE </div>
      <img src= "<?php echo $DEFAULT_LOCATION.'fblike.svg'; ?>" width="15px" height="15px" id="SelectShowGenre"></img></td>
    </td>
     
    </tr>

  <tr>
    <td class="InnerRectTextBox">
      <div class="GenreControlBox">
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
      </table> <!-- For GenreTable -->
      </div> 
    </td> <!-- InnerRectTextBox -->
  
  </tr> 

  <!-- Language Row -->

  <tr>  
    <td class="TitleBox"><div class="NameBoxTag">LANGUAGE</div>
    </td>
  </tr>
  
  <tr>
    <td>
      <table class="GenreTable">
        <tr>
          <td><input type="button" title="English" name="english" value="ENGLISH" class="Language" onclick="LanguageClick('english');" id="english"></td>
          <td><input type="button" title="Tamil" name="tamil" value="TAMIL" class="Language" onclick="LanguageClick('tamil');" id="tamil"></td>
          <td><input type="button" title="Telugu" name="telugu" value="TELUGU" class="Language" onclick="LanguageClick('telugu');" id="telugu"></td>
          <td><input type="button" title="Malayalam" name="malayalam" value="MALAYALAM" class="Language" onclick="LanguageClick('malayalam');" id="malayalam"></td>
          <td><input type="button"  title="Hindi" name="hindi" value="HINDI" class="Language" onclick="LanguageClick('hindi');" id="hindi"></td>
        </tr> 
      </table> <!-- GenreTable -->
    </td> <!-- InnerRectTextBox -->
  </tr>  <!-- Language -->
</table> <!-- TableTagFile -->
</div> <!-- Innerrectangle -->

</td>  <!-- Enclose -->
</tr>
</table>

<div id="Whiteline"></div>
<table id = "SaveEnclose" >
  <tr>
    <td>
      <img src= "<?php echo $DEFAULT_LOCATION.'save.png'; ?>" class="ImgSave" ></img>
    </td>

    <td>
      <input type="button" name="close_movie" value="SAVE" class="SaveNClose" onclick="SaveGenreLanguage('<?php echo $movie_path; ?>')"  title="Save the changes made and close this window" id="save"  /></td>
    </td>

  </tr>
</table>


<div id = "FileWrite"></div>


</body>
</html>
