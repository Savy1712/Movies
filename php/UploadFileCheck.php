<?php
include "Paths.php";
?>

<html lang="en">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link type="text/css" rel="stylesheet" href="/Movies/css/style.css">


<script  src="/Movies/js/Movie.js"> </script>
</head>

<?php
$first_half = "";
$second_half = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $first_half = $_POST["error_message_first"];
  $second_half = $_POST["error_message_second"];
}
?>


<body>
<div id="Uploadrectangle">
<div class="RedEnclose">
<table>
<tr>
<td width="100%">
<div id="SideHeadingsError">ERROR MESSAGE</div>
</td>
<td width="20%">
<img src="<?php echo $DEFAULT_LOCATION.'home1.png'; ?>"  width="50px" height="50px" onclick="Close()" title="GO TO HOME" />
</td>
</tr>
</table>
</div>

<table class="UploadFileToServer">
<tr>
<td>
<img src="<?php echo $DEFAULT_LOCATION.'cross.png'; ?>" width="100px" height="100px" ></img>
</td>
<td>
<div class="NameBox"> 
<?php echo $first_half."<h1>".$second_half."</h1>"; ?>
</div>
</td> 
</tr>
</table>
<table class="UploadFileToServer">
<tr>
<td>
<input type="button" id="error_ok" value="GO TO UPLOAD PAGE" class="UploadBut" onclick="UploadMovie();" />
</td>
</tr>
</table>

</div>
</body>
</html>


