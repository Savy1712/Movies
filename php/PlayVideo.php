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
<div id = "InnerBox">

 
<div id = "MovieName"><h1> <?php echo  $movie_name; ?></h1> </div>
<video controls width="1280" height="720" >
<source src="<?php echo $movie_path ?>" >
</video>
</div>
</body>
</html>

