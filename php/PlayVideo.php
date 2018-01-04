<html lang="en">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link type="text/css" rel="stylesheet" href="/Movies/css/style.css">

<script  src="/Movies/js/Movie.js"> </script>
</head>


<?php 
$movie_path = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $movie_path = htmlspecialchars($_POST["movie_path"]);
}
?>	 

<body>
<div id = "InnerBox">
<video controls width="480" height="640">
<source src="<?php echo $movie_path ?>" >
</video>

</body>
</html>

