
function MoviePlay(path, name="") {
  var xmlhttp = new XMLHttpRequest();
  var movie_path = path.split("#?")[0];
  var movie_name = (path.split("#?")[1]).replace("&", " ");
  var param = "movie_path="+movie_path;
  xmlhttp.open("POST", "/Movies/php/PlayVideo.php", true);
  xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("InnerBox").innerHTML = this.responseText;       
    }
  };
  xmlhttp.send(param);  
}


function DisplayMovies(genre) {

  document.getElementById("Display").value = genre;
     
  var xmlhttp = new XMLHttpRequest();
  var param = "genre="+genre;
  xmlhttp.open("POST", "/Movies/php/Home.php", true);
  xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("rectangle").innerHTML = this.responseText;       
    }
  };

  var class_name = document.getElementsByClassName('SortContent');
  
  for(i=0; i < class_name.length;i++) {
    var div = document.getElementById(class_name[i].name);    
    if(class_name[i].name == genre) {
        //alert(class_name[i].name+" "+genre);
        div.style.border="10px solid green";
    } else {
        div.style.border="3px";
    }
  }
  xmlhttp.send(param);
 
  
}


function TagMovie(path, name="") {

  // TODO: Get the language and genre from the "HOME.php" file 
  var xmlhttp = new XMLHttpRequest();
  var movie_path = path.split("#?")[0];
  var movie_name_with_amb = (path.split("#?")[1]);

  /* Getting the Language and Genre details */
  var language = "";
  var genre = "";
  if((path.split("#?")).length > 2 ){
    var temp_var = path.split("#?");
    // Presence of #? indicates the presence of next element 
    for(i = 2; i < temp_var.length; i++) {
      if((temp_var[i].split("="))[0] == "Language") language = temp_var[i].split("=")[1];
      if((temp_var[i].split("="))[0] == "Genre") genre = temp_var[i].split("=")[1];
    }
  }

  /* Replace all the occurences -> /g/  */
  var movie_name = movie_name_with_amb.replace(/&/g, " ");
 
  /* Appending the language and genre details */
  var param = "movie_path="+movie_path+"&movie_name="+movie_name+"&Language="+language+"&Genre="+genre;
  xmlhttp.open("POST", "/Movies/php/TagAndPlayVideo.php", true);
  xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("Tagging").innerHTML = this.responseText;       
    }
  };
  document.getElementById("Tagging").style.display ="block";
  xmlhttp.send(param);     
}

function Close() {
  location.href ="/Movies/php/Home.php";
}

function SayThanks() {
  if( ((document.getElementById("Genre").value == "dontknow") && !(document.getElementById("Language").value == "dontknow")) || 
    (!(document.getElementById("Genre").value == "dontknow") && (document.getElementById("Language").value == "dontknow")) || 
    (!(document.getElementById("Genre").value == "dontknow") && !(document.getElementById("Language").value == "dontknow")) ) {
    document.getElementById("hidebox").style.display = "block";
  } else {
      document.getElementById("hidebox").style.display = "none";
  }
}


function GenreClick(name) {
  var class_name = document.getElementsByClassName('GenrePics');
  for(i=0; i < class_name.length;i++) {
    var div = document.getElementById(class_name[i].name);    
    if(class_name[i].name == name) {
        div.style.border="5px solid green";
        document.getElementById('Genre').value = class_name[i].name;
    } else {
	div.style.width="100px";
	div.style.height="100px";
	div.style.border="1px solid whitesmoke";
	div.style.margin="1% 0px 20% 20%"; 
    }
  }
}

function LanguageClick(name) {
  var class_name = document.getElementsByClassName('Language');
  for(i=0; i < class_name.length;i++) {
    var div = document.getElementById(class_name[i].name);
    if(class_name[i].name == name) {
        div.style.width="250px";
	div.style.color="white";
        div.style.fontSize="35px";
	div.style.backgroundColor="red";
        //TODO: increase the font size
        document.getElementById('Lang').value = class_name[i].name;
    } else {
        div.style.width="150px";
	div.style.color="white";
	div.style.fontSize="20px";
	div.style.backgroundColor="green";
        
    }
  }
}

function ExecXMLForTagging(file_path, language_file_path, genre_file_path) {
  var xmlhttp = new XMLHttpRequest();
  var param = "File_path="+file_path+"&Language="+language_file_path+"&Genre="+genre_file_path;
  xmlhttp.open("POST", "/Movies/php/FileWrite.php", true);
  xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {   
      document.getElementById("FileWrite").innerHTML = this.responseText;         
    }
  };
  xmlhttp.send(param);
}


function SaveGenreLanguage(movie_path) {
  var removing_file_name = movie_path.split("/");
  var file_name = removing_file_name[removing_file_name.length - 1 ];   
  var file_path = movie_path.replace(file_name, "");
  var genre_file_path = document.getElementById("Genre").value;
  var language_file_path = document.getElementById("Lang").value;
  alert(genre_file_path+" "+language_file_path);
  /* Writing the Genre and Language to file_path mentioned */
  ExecXMLForTagging(file_path, language_file_path, genre_file_path);
  document.getElementById("save").value = "SAVED";
}


function highlight(name) {
  document.getElementById("Romance").style.backgroundColor="red";
}

function PlayAfterTag() {
  
}
