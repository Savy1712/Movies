<?php
include "Paths.php";
?>

<html lang="en">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link type="text/css" rel="stylesheet" href="/Movies/css/style.css">


<script  src="/Movies/js/Movie.js"> </script>
</head>

<div id="UploadFileCheck"></div>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $movie_name  = htmlspecialchars($_POST["MovieName"]);
  $movie_year  = htmlspecialchars($_POST["MovieYear"]);
  $movie_genre = htmlspecialchars($_POST["MovieGenre"]);
  $movie_language = htmlspecialchars($_POST["MovieLanguage"]);
  $movie_path = htmlspecialchars($_POST["MoviePath"]);
  $movie_status = htmlspecialchars($_POST["UploadStatus"]);
  $FileName = $_FILES['userfile']['name'];
  $Tmp_name =  $_FILES['userfile']['tmp_name'];
  $show = htmlspecialchars($_POST["Show"]);
  //if(is_uploaded_file($Tmp_name)) { echo "uploaded properly"; }
  /* if(move_uploaded_file($Tmp_name, $HOME_FOLDER."/Movies/Videos/".$FileName)) {
    echo "moving done";
  }  */
}
?>



<body>
<form name="form1" id = "formID" action="/Movies/php/Home.php" method = "POST" enctype = "multipart/form-data" >
<div id = "Uploadrectangle">
<div class="Enclose">
<table>
<tr>
<td width="100%">
<div id="SideHeadings">NEW FILE UPLOAD</div>
</td>
<td width="20%">
<img src="<?php echo $DEFAULT_LOCATION.'home1.png'; ?>" class="Exit" width="50px" height="50px" onclick="Close()" title="GO TO HOME" />
</td>
</tr>
</table>
<table>
<tr>
<td width="50%"><div class="MoviePNG"><img src="<?php echo $DEFAULT_LOCATION.'Movies.png'; ?>" onclick="Close()" title="GO TO HOME"></div> </td>
<td>
<table class="UploadFileToServer">
<tr class="WhiteEnclose"  >

<!-- Checking for the size of upload file name box -->
<td><input class="<?php if($movie_status == "F") { ?> UploadBox <?php } else { ?> ShortUploadBox <?php } ?>" type="Text" id="UploadFileName" name="UploadFileName1" placeholder="Movie Name" value="<?php echo $movie_name; ?>" autofocus />
<?php 
/* Checking for existence of file name */
if($show == "show") {
?>
<img id="errorimage" class="ErrorPNG" src="<?php echo $DEFAULT_LOCATION.'error.png'; ?>" width="30px" height="30px" opacity="0.99" />
<?php } else {
?>
<img id="errorimage" class="ErrorPNG" src="<?php echo $DEFAULT_LOCATION.'error.png'; ?>" width="0px" height="0px" opacity="0" />
<?php 
}
?>
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
<input class="inputFile" type="file" id="userfile" name="userfile" onchange="BrowseMovie(0)"  onkeypress="Deactivate()" accept="video/*" <?php if($movie_status == "F") { ?> disabled <?php } ?> form = "form1"/>
<label for="userfile">BROWSE</label>
</td>
<td> <div class="NameBox"> *Hint : Use only MP4, AVI, MKV </div></td>
</tr>
</table>

<table class="UploadFileToServer" > <!-- <?php if($movie_name != "" ) { ?> UploadFileToServer <?php } else { ?>  UploadProcedure <?php } ?>" > --> 
<tr>
<td><div class= "NameBox"> FILE UPLOADING </div>
</td>
</tr>

<tr>
<td>
<input type="text" id="FilePath" class="PathBox" value="<?php echo $movie_path; ?>" disabled />
</td>
</tr>
</table>

<table class="UploadFileToServer">
<tr>
<td><div class= "NameBox">STATUS 
<?php 
  if($movie_status == "F") { 
?>
<img src="<?php echo $DEFAULT_LOCATION.'fblike.svg'; ?>"  width="30px" height="30px" ></img>
<?php 
} 
?>
</div>
</td>
</tr>



<tr width="100%">
<td>
<div id = "FullBar">
<div id = "IncreasingBar">
</div>
</div>
</td>
</tr>
</table>

<table class="UploadFileToServer">
<tr>
<td>
<img src="<?php echo $DEFAULT_LOCATION.'Loading.gif'; ?>" width="70px" height="70px" id="LoadingFunction" value="Uploading File" />
</td>
<td>
<div class="NameBox" id="UploadingFunction"> UPLOAD IN PROGRESS.. </div>
</td>
</tr> 
</table>




<table class="<?php if($movie_status == "F") { ?> UploadFileToServer <?php } else { ?>  UploadProcedure <?php } ?>" >  
<tr>
<td>
<input type="submit"  name="FinalUpload" class="UploadBut" value="FINISH" id="FinalUpload" />
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


