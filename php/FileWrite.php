
<?php
include "Paths.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $movie_path = htmlspecialchars($_POST["File_path"]);
  $language = htmlspecialchars($_POST["Language"]);
  $genre = htmlspecialchars($_POST["Genre"]);

  /* Getting the contents of video file and write it to Info.txt */
  $file_name = $HOME_FOLDER.$movie_path."Info.txt";
  
  $file_read=file_get_contents($file_name);
  $dict_file_read = explode(";", $file_read);
  
  $name_value = "";
  $year_value = "";
  for($i = 0; $i < count($dict_file_read); $i++) {
    $temp_value = explode("=", $dict_file_read[$i]);
    if($temp_value[0] == $INFO_FILE[$i]) {
      if($temp_value[0] == "Name") $name_value = $temp_value[1];
      if($temp_value[0] == "Year") $year_value = $temp_value[1];   
    } else break;
  }
  $final_write = "";

  /* Writing all the words in caps */
  $language = strtoupper($language);
  $genre = strtoupper($genre);

  /* Writing the contents into the Info.txt file */
  if($language != "" and $genre != "")  {
    $final_write = "Name=".$name_value.';Year='.$year_value.';Language='.$language.';Genre='.$genre.';';
  } else if ($language == "" and $genre != "") {
      $final_write = "Name=".$name_value.';Year='.$year_value.';Genre='.$genre.';';
  } else if ($language != "" and $genre == "") {
      $final_write = "Name=".$name_value.';Year='.$year_value.';Language='.$language.';';
  } else if($language == "" and $genre == "") {
      $final_write = "Name=".$name_value.';Year='.$year_value.';';
  }
    
  $open_file = fopen($file_name,"w");
  if($open_file == NULL) {
    /* Send mail about this information : movie name and person tried to tag */  
  }
  fwrite($open_file, $final_write);
  fclose($open_file);
}
?>	 


