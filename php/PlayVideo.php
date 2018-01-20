<?php
include "Paths.php";
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
}
?>	 

<script  src="/Movies/js/Movie.js"> </script>
</head>


<body>

<div class = "Enclose"> 
<table>
<tr>
<td><img src="<?php echo $DEFAULT_LOCATION.'back.png'; ?>" width="100" height="100" onclick="Close()" /></td>
<td width="100%"> <div class="MovieName"> <h1> <?php echo  strtoupper($movie_name) ; ?></h1> </div> </td>
</tr>
</table>
</div>
<div id = "InnerBox">
<video controls width="640" height="480" >
<source src="<?php echo $movie_path ?>" >
</video>
</div>
</body>
</html>

