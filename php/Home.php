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
    while (($folder_open = readdir($dir_open)) !==  false ) {
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
        if((!strcmp($folder_open,".")  or !strcmp($folder_open,"..")) ) {
        } else {
          $movie_list[] = $entire_path.'/'.$folder_open;
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
<table id='MovieList'>
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
 
  $dir = file_get_contents($file_path."/Info.txt");
  $dir_list = explode(";", $dir);
  
  # Getting the Movie name 
  $file_name = explode("=", $dir_list[0])[1];
  $image_path = "";

  # Adding the Language and Genre headings
  $language = "";
  $genre = "";

  if(count($dir_list) > 2) {
    if(count($dir_list) == 4) {
      if(explode("=", $dir_list[2])[0] == "Language") $language = explode("=", $dir_list[2])[1];
      else if(explode("=", $dir_list[2])[0] == "Genre") $genre = explode("=", $dir_list[2])[1];
    }
    else if(count($dir_list) == 5) {
      $language = explode("=", $dir_list[2])[1];
      $genre = explode("=", $dir_list[3])[1]; 
    } 
  }
  
  # Getting the Image path
  $image_path = str_replace($HOME_FOLDER,"",$file_path);
  $movie_path = str_replace($HOME_FOLDER,"",$movie_full_name)."#?".str_replace(" ", "&",$file_name);

  # Merging the movie_path with Language and Genre
  if($language != "") $movie_path = $movie_path."#?Language=".$language;
  if($genre != "") $movie_path = $movie_path."#?Genre=".$genre;
 
  #Image file path
  $image_file_name = $image_path."/Image.png";
  if(!file_exists($HOME_FOLDER.$image_file_name)) {
    $image_file_name = str_replace("/Videos","",$FILE_LOCATION).'/Default/Image.jpg';
  }
  
  #Tag and Play togging options check 
  $play_movie = False;
  $tag_movie = True;

  #Checking for the Info.txt entries to toggle between Tag Movies and Play Movies. 
  if(count($dir_list) == 5) {
    $i = 0;
    $info_text = array('Name', 'Year','Language','Genre');
    $check_true = 0;
    for(; $i < count($dir_list); $i++) {
      $check_info_text = explode('=', $dir_list[$i]);
      if($check_info_text[0] == $info_text[$i]) {
        $check_true = $check_true + 1; 
      } 
    }
    
    if($check_true == count($info_text) + 1) {
      $play_movie = True;
      $tag_movie = False;
    }  
  } 

  # TODO: Merge the Name, Language=<Default> and Genre=<Default>(if not present) with the $movie_path and send to TagMovie
  # If everything is present, play movie will be present.

  echo "<td>";
  echo "<div id ='SquareBox'>";
  echo "<div id ='Straightline'></div>";
  echo "<div id ='InnerSquareHeading' wrap='soft'>";
  echo "$file_name</div>";
  echo "<div id='InnerSquare'>";
  echo "<img src='$image_file_name' width='200' height='200'></img></div>";
  if($play_movie == True and $tag_movie == False) {
    echo "<input type='button' name='play_movie' value='PLAY MOVIE' class='PlayMovie' onclick=MoviePlay('$movie_path') />";
  } else if($play_movie == False and $tag_movie == True) {
      echo "<div id='Tagging' style='display:none' scrollbars='yes' ></div>";
      echo "<input type='button' name='tag_movie' value='TAG & PLAY' class='TagMovie' onclick=TagMovie('$movie_path') />";
  }
  
  echo "</div>";
  echo "</td>";
endforeach;
?>
</tr>
</table>

</div>

</body>
</html>

