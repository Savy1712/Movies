<?php
include "Paths.php";
?>

<html lang="en">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link type="text/css" rel="stylesheet" href="/Movies/css/style.css">

<?php 
$movie_name = "";
$movie_year = "";
$show = "";
$movie_genre = "";
$movie_language = "";
$movie_path = "";
$browse_but = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $movie_name = htmlspecialchars($_POST["MovieName"]);
  $movie_year = htmlspecialchars($_POST["year"]);
  $movie_genre = htmlspecialchars($_POST["genre"]);
  $movie_language = htmlspecialchars($_POST["language"]);
  $movie_path = htmlspecialchars($_POST["moviepath"]);
  $show = htmlspecialchars($_POST["show"]);
  $browse_but = htmlspecialchars($_POST["browse"]);
}
?>	 

<script  src="/Movies/js/Movie.js"> </script>
</head>

<body>
<div id = "Uploadrectangle">
<div class="Enclose">
<div id="SideHeadings">NEW FILE UPLOAD</div>

<table>
<tr>
<td width="50%"><div class="MoviePNG"><img src="<?php echo $DEFAULT_LOCATION.'Movies.png'; ?>"></div> </td>
<td>
<table class="UploadFileToServer">
<tr>
<td><input class="UploadBox" type="Text" id="UploadFileName" name="UploadFileName" placeholder="Movie Name" value="<?php echo $movie_name; ?>" /></td>
<td><img class="ErrorPNG" src="<?php echo $DEFAULT_LOCATION.'error.png'; ?>" width="0px" height="0px" /></td>
</tr>
</table>

<table class="UploadFileToServer">
<tr>
<td ><div class="NameBox"> MOVIE YEAR</div> </td>
<td>
  <?php 
      $old_year = 2000;
      $current_year = date('Y');
      echo "<select id='MovieYear' class='DropBox' onchange='' onkeypress='' value='$movie_year'>";
      echo "<option>DONT KNOW</option>";
      foreach(range($current_year, $old_year) as $i):
        echo "<option> $i </option>"; 
      endforeach;
      echo "</select>";   
    ?>
</td>
</tr>

<tr>
<td><div class="NameBox">GENRE</div> </td>
<td width="60%">
  <?php 
      $total_length = count($GENRES) - 1;
      echo "<select id='MovieGenre' class='DropBox' onchange='' onkeypress='' value='$movie_genre' >";
      echo "<option>DONT KNOW</option>"; 
      foreach(range(0, $total_length) as $i):
        echo "<option> $GENRES[$i] </option>"; 
      endforeach;
      echo "</select>";   
    ?>
</td>
</tr>

<tr>
<td><div class="NameBox">LANGUAGE</div> </td>
<td width="60%">
  <?php 
      $total_length = count($LANGUAGES) - 1;
      echo "<select id='MovieLanguage' class='DropBox' onchange='' onkeypress='' value='$movie_language'>";
      echo "<option> DONT KNOW </option>";  
      foreach(range(0, $total_length) as $i):
        echo "<option> $LANGUAGES[$i] </option>"; 
      endforeach;
      echo "</select>";   
    ?>
</td>
</tr>

<tr>
<td>
<input class="inputFile" type="file" id="file" name="fileID" onchange="BrowseMovie()" <?php if($browse_but == "Disabled") { ?> disabled <?php } ?> />
<label for="file">BROWSE</label>
</td>
</tr>
</table>

<table class="<?php if($show == "") { ?>  UploadProcedure <?php } else { ?> UploadFileToServer <?php } ?>" >
<tr>
<td><div class= "NameBox"> FILE TO BE UPLOADED </div>
</td>
</tr>
<tr>
<td>
<input type="text" id="FilePath" class="UploadBox" value="<?php echo $movie_path; ?>" />
</td>
</tr>
</table>

<table class="<?php if($show == "") { ?>  UploadProcedure <?php } else { ?> UploadFileToServer <?php } ?>" >
<tr>
<td>



<input type="button" title="Upload the file" name="FinalUpload" class="UploadBut" value="UPLOAD" onclick="UploadMovieFile()" id="FinalUpload" />
</td>

</tr>
</table>

</td>

</tr>
</table>

</div>

</div>
</body>
</html>
