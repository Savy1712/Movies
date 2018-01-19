<!DOCTYPE HTML> 
<?php
include "Paths.php";
?>

<div id = "rectangle">
<html lang="en">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link type="text/css" rel="stylesheet" href="/Movies/css/style.css">


<script  src="/Movies/js/Movie.js"> </script>
</head>

<div class="Enclose">
<table>
<tr>
<td class="Symbol">
<img src="<?php echo $DEFAULT_LOCATION.'movie.png'; ?>" width="70" height="50"  title="GO TO HOME" onclick="GoHome()" />
</td>
<td class="MovieName"> 
<div id = "SideHeadingsFront">MOVIES</div></td>
<td class="Align">
<input type="text" id="FindMovie"  placeholder="Search Movies by Name..." class="Move" width="100%" value="<?php echo $search_movie; ?>" />
</td>
<td class="Find">
<input type="button" value="FIND" class="FindBut" onclick="FindMovie()"/> 
</td>
</tr></table>
</div>
<!--
<div id ="RightCornering"> 
</div>

-->

<body>
<div id = "Body">


<?php 
$genre_post = "";
$search_movie = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $genre_post = $_POST["genre"];
  $search_movie = $_POST["search_movie"];
}



    
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
    echo explode("/", $movie)[6].' '.$movie.'\n';
  endforeach;
}

# Running through "Videos/<folder_name>

?>

<table class = "Sort">
<tr>

<td>

<div class = "SortColumn" >
<input type="hidden" id="Display" value="" />
<input type="button" id="ALL" name="ALL" value="ALL" class= "<?php if($genre_post == "ALL" || $genre_post == "" ) { ?> highlight <?php } else { ?> SortContent <?php } ?>" onclick="DisplayMovies('ALL');" />
<input type ="button" id="HORROR" name="HORROR" value="HORROR" class="<?php if($genre_post == "HORROR") { ?> highlight <?php } else { ?> SortContent <?php } ?>" onclick="DisplayMovies('HORROR');" />
<input type="button" id="ROMANCE" name="ROMANCE" value="ROMANCE" class="<?php if($genre_post == "ROMANCE") { ?> highlight <?php } else { ?> SortContent <?php } ?>" onclick="DisplayMovies('ROMANCE');"/>
<input type="button" id="ACTION" name="ACTION" value="ACTION" class="<?php if($genre_post == "ACTION") { ?> highlight <?php } else { ?> SortContent <?php } ?>"  onclick="DisplayMovies('ACTION');"/>
<input type="button" id="THRILLER" name="THRILLER" value="THRILLER" class="<?php if($genre_post == "THRILLER") { ?> highlight <?php } else { ?> SortContent <?php } ?>"  onclick="DisplayMovies('THRILLER');"/>
<input type="button" id="SCIFI" name="SCIFI" value="SCIFI" class="<?php if($genre_post == "SCIFI") { ?> highlight <?php } else { ?> SortContent <?php } ?>" onclick="DisplayMovies('SCIFI');"/>
<input type="button" id="MUSICAL" name="MUSICAL" value="MUSICAL" class="<?php if($genre_post == "MUSICAL") { ?> highlight <?php } else { ?> SortContent <?php } ?>" onclick="DisplayMovies('MUSICAL');"/>
<input type="button" id="MYSTERY" name="MYSTERY" value="MYSTERY" class="<?php if($genre_post == "MYSTERY") { ?> highlight <?php } else { ?> SortContent <?php } ?>" onclick="DisplayMovies('MYSTERY');"/>
<input type="button" id="FANTASY" name="FANTASY" value="FANTASY" class="<?php if($genre_post == "FANTASY") { ?> highlight <?php } else { ?> SortContent <?php } ?>" onclick="DisplayMovies('FANTASY');"/>
<input type="button" id="WESTERN" name="WESTERN" value="WESTERN" class="<?php if($genre_post == "WESTERN") { ?> highlight <?php } else { ?> SortContent <?php } ?>" onclick="DisplayMovies('WESTERN');" />
</div>
</td>

</tr>
</table>



<?php
$one_time = False;
$search_count = 0;
$movie_count = 0;
$display = False;


foreach ($folder_list as $folder):
/*<div id = "TagBox"><h1> <?php echo explode("_", $folder)[1]; ?> </h1> </div> */

?>
<div id ='InnerBox'> 
<table class='MovieList'>
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
  
  $subs_available = false;



  if( glob($file_path."/*.srt") == true ) {
    $subs_available = true;
  }
  $dir = file_get_contents($file_path."/Info.txt");
  $dir_list = explode(";", $dir);
  
  # Getting the Movie name 
  $file_name = explode("=", $dir_list[0])[1];
  $image_path = "";

  if($search_movie != "" ) {
    if (strpos(strtoupper($file_name), strtoupper($search_movie)) !== False) {
    } else {
        $search_count = $search_count + 1; 
        if($search_count == count($movie_list) - 1 and $one_time == False ) {
          echo "</tr></table><div id='ErrorBox'>";
          echo "<table class='Sort'><tr>";
          echo "<td><img src=".$DEFAULT_LOCATION."cross.png"." width='100' height='100' ></img></td>";
          echo "<td> <h1>Sorry ! Not available </h1> </td>";
          echo "</tr></table>";
          echo "</div>";
          $one_time = True;
        } else  { continue; }
     }
   } 
   



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

  if($movie_count == count($movie_list) - 1 and $one_time == False) {
    $display = True;
    echo "</tr></table><div id='ErrorBox'>";
    echo "<table class='Sort'><tr>";
    echo "<td><img src=".$DEFAULT_LOCATION."cross.png"." width='100' height='100' ></img></td>";
    echo "<td> "."  NO MOVIES ARE AVAILABLE UNDER <h1 title= 'Tag movies from available ones in ALL Section'>".$genre_post."</h1> SECTION </td>";
    echo "</tr></table>";
    echo "</div>";
    $one_time = True;
    break;  
  }

  # Genre specific search in Home page
  if($genre_post != "ALL") { 
    if($genre_post != "" ) {
      if($genre == "" ) { $movie_count = $movie_count + 1; continue; } 
      else if ($genre != $genre_post ) { $movie_count = $movie_count + 1; continue; }
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

  if (strpos($movie, $folder) !== false) { 
  echo "<td>";  
  echo "<div id ='SquareBox'>";
  echo "<div id ='Straightline'>";
  echo "</div>";
  echo "<div id ='InnerSquareHeading' wrap='soft'>";
  echo "<center>$file_name</center>";
  echo "</div>";
  
  echo "<div id='InnerSquare'>";
  echo "<img src='$image_file_name' width='200' height='200'></img></div>";
  if($play_movie == True and $tag_movie == False) {
    echo "<input type='button' name='play_movie' value='PLAY MOVIE' class='PlayMovie' onclick=MoviePlay('$movie_path') />";
    echo "<input type='button' name='change_tag' value='CHANGE TAG' class='PlayMovie' onclick=TagMovie('$movie_path') />";
    if($subs_available) {
      echo "<div class ='Subs' title='Subtitle is available'>SUBS</div>";
    } 

 
    /*
    echo "<table><tr>";
    echo "<td><input type='label' name='genre_display' value='$genre' class='GenreDisplay' title='Genre' disabled /></td>";
    echo "<td><input type='label' name='language_display' value='$language' class='LanguageDisplay' title='Language' disabled /></td>";
  
    echo "</tr>";
    echo "</table>"; */
  } else if($play_movie == False and $tag_movie == True) {
      echo "<input type='button' name='tag_movie' value='TAG & PLAY' class='TagMovie' onclick=TagMovie('$movie_path') />";
      if($subs_available) {
        echo "<div class ='SubsTag' title='Subtitle is available' >SUBS</div>";
      } 
    
  }
  
  echo "</div>";
  echo "</td>";
  }
endforeach;
?>



<?php 

if($display == False ) {
  echo "</tr>";
  echo "</table>";
}
?>
</div>

<?php
endforeach;
?>

</div>

</body>
</div>

<div id='Tagging' style='display:none' scrollbars='yes' ></div>


</html>


