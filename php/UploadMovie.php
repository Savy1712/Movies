<?php
include "Paths.php";
?>

<html lang="en">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link type="text/css" rel="stylesheet" href="/Movies/css/style.css">


<script  src="/Movies/js/Movie.js"> </script>
</head>

<body>
<form action="/Movies/php/FileUpload.php" method = "POST" enctype = "multipart/form-data" >
<div id = "Uploadrectangle">
<div class="Enclose">
<div id="SideHeadings">NEW FILE UPLOAD</div>

<table>
<tr>
<td width="50%"><div class="MoviePNG"><img src="<?php echo $DEFAULT_LOCATION.'Movies.png'; ?>"></div> </td>
<td>
<table class="UploadFileToServer">
<tr class="WhiteEnclose">
<td><input class="UploadBox" type="Text" id="UploadFileName" name="UploadFileName" placeholder="Movie Name" value="<?php echo $movie_name; ?>" />
<img id="errorimage" class="ErrorPNG" src="<?php echo $DEFAULT_LOCATION.'error.png'; ?>" width="0px" height="0px" opacity="0" />
</td>
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
<input class="inputFile" type="file" id="userfile" name="userfile" onchange="BrowseMovie()"  accept="video/*" <?php if($browse_but == "Disabled") { ?> disabled <?php } ?> />
<label for="userfile">BROWSE</label>
</td>
<td> <div class="NameBox"> *Hint : Use only MP4, AVI, MKV </div></td>
</tr>
</table>

<table class="UploadFileToServer" id="UploadBlockShow" > 
<tr>
<td><div class= "NameBox"> FILE TO BE UPLOADED </div>
</td>
</tr>
<tr>
<td>
<input type="text" id="FilePath" class="PathBox" value="<?php echo $movie_path; ?>" />
</td>
</tr>
</table>



<table class="UploadFileToServer"  id="UploadBlockShowBut" > 
<tr>
<td>
<input type="submit" title="Upload the file" name="FinalUpload" class="UploadBut" value="UPLOAD" onclick="UploadMovieFile()" id="FinalUpload" />
</td>
</tr>
</table>



</td>
</tr>
</table>
</div>
</div>
</form>
</body>
</html>
