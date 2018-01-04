<!DOCTYPE HTML> 
<?php
include "Paths.php";
?>

<html lang="en">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link type="text/css" rel="stylesheet" href="/Movies/css/style.css">

<script  src="/Movies/js/Movie.js"> </script>
</head>


<div id = "SideHeadings"> MOVIES  </div>

<body>

<?php 
$i = 0;

$folder_list = [];

# Checking for "Videos/" folder existence
if(!file_exists($HOME_FOLDER.$FILE_LOCATION)) {
  echo $HOME_FOLDER.$FILE_LOCATION." doesnt exist";
  exit(-1);
}

#Check for folders inside "Videos/"
if(is_dir($HOME_FOLDER.$FILE_LOCATION)) {
  if($dir_open = opendir($HOME_FOLDER. $FILE_LOCATION)) {
    while (($folder_open = readdir($dir_open)) != false ) {
      if(!($folder_open == '.' or $folder_open == "..")) {
        $folder_list[] = $folder_open; 
       }    
    }   
    closedir($dir_open);
  } else {
      echo $HOME_FOLDER.$FILE_LOCATION. " cannot be opened ";
      exit(-1);	
  }
} 

else {
  echo $HOME_FOLDER.$FILE_LOCATION. "is not a directory to proceed";
  exit(-1);
}

#Debugging the folder content 
if($DEBUG) { 
  foreach($folder_list as $folder_name):
    echo $folder_name;
  endforeach;
}

$movie_list = [];

#Check for folders inside "Videos/"
foreach ($folder_list as $folder_name):
  $entire_path = $HOME_FOLDER.$FILE_LOCATION.$folder_name;
  if(is_dir($entire_path)) {
    if($dir_open = opendir($entire_path)) {
      while (($folder_open = readdir($dir_open)) != false ) {
        if(!($folder_open == '.' or $folder_open == "..")) {
          $movie_list[] = $entire_path.'/'. $folder_open;
         }    
      }   
      closedir($dir_open);
    } else {
        echo $entire_path. " cannot be opened ";
        exit(-1);	
    }
  }
  else {
    echo $entire_path. "is not a directory to proceed";
    exit(-1); 
  }
endforeach;


if($DEBUG) {
  foreach($movie_list as $movie):
    echo $movie;
  endforeach;
}

# Running through "Videos/<folder_name>"
?>  
<div id='InnerBox'>  
<table id='MovieList' >
<tr>

<?php 
foreach($movie_list as $movie):
  $file_path = $movie;
  $movie_full_name = ""; 
  foreach($VIDEO_TYPES as $type):
    if(($movie_array = glob($file_path."/*.".$type)) == true) {
      $movie_full_name = $movie_array[0];
    }  
  endforeach;
  $movie_path= $movie_full_name;
  $dir = file_get_contents($file_path. "/Info.txt");
  $dir_list = explode(';', $dir);

  # Getting the Movie name 
  $file_name = explode('=', $dir_list[0])[1];
  $image_path_list = explode('/', $file_path);
  $image_path = "";

  # Getting the Image path
  $image_path = str_replace($HOME_FOLDER,"",$file_path);
  $movie_name = str_replace($HOME_FOLDER, "", $movie_full_name);
  $image_file_name = $image_path."/Image.png";
  
  echo "<td>";
  echo "<div id ='SquareBox'>";
  echo "<div id ='Straightline'></div>";
  echo "<div id ='InnerSquareHeading' wrap='soft' >";
  echo $file_name. "</div>";
  echo "<div id='InnerSquare'>";
  echo "<img src='$image_file_name' width='200' height='200'></img></div>";
  echo "<input type='button' name='play_movie' value='PLAY MOVIE' class='PlayMovie' onclick=MoviePlay('$movie_name','$file_name') />";
  echo "</div>";
  echo "</td>";
endforeach;
?>
</tr>
</table>

</div>

</body>
</html>

