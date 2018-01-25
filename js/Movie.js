
function MoviePlay(path, name="") {
  var xmlhttp = new XMLHttpRequest();
  var movie_path = path.split("#?")[0];
  var movie_name = (path.split("#?")[1]).replace("&", " ");
  var param = "movie_path="+movie_path+"&movie_name="+movie_name;
  xmlhttp.open("POST", "/Movies/php/PlayVideo.php", true);
  xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("rectangle").innerHTML = this.responseText;       
    }
  };
  xmlhttp.send(param);  
}


function GoHome() {
  Close();
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
   document.getElementById("rectangle").style.opacity="0.001";
  
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

function NameInitiate() {
  
  if(document.getElementById("MovieName").value != "" ) {
    document.getElementById("SelectShowName").style.visibility="visible";
    document.getElementById("SaveEnclose").style.visibility="visible";
  } 
  else document.getElementById("SelectShowName").style.visibility="hidden";
}

function YearInitiate() {
  if(document.getElementById("MovieYear").value != "" ) {
    document.getElementById("SelectShowYear").style.visibility="visible";
    document.getElementById("SaveEnclose").style.visibility="visible";
  }
  else document.getElementById("SelectShowYear").style.visibility="hidden";
}



function FindMovie() {
  var find_movie = document.getElementById("FindMovie").value;
  var xmlhttp = new XMLHttpRequest();
  var param = "genre="+"ALL"+"&search_movie="+find_movie;
  xmlhttp.open("POST", "/Movies/php/Home.php", true);
  xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
      document.getElementById("rectangle").innerHTML = this.responseText;          
    }
  };
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
  document.getElementById("SaveEnclose").style.visibility="visible";
  document.getElementById("SelectShowGenre").style.visibility= "visible";
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
    }
  }
}

function LanguageClick(name) {
  document.getElementById("SaveEnclose").style.visibility="visible";
  document.getElementById("SelectShowLanguage").style.visibility= "visible";
  var class_name = document.getElementsByClassName('Language');
  for(i=0; i < class_name.length;i++) {
    var div = document.getElementById(class_name[i].name);
    if(class_name[i].name == name) {
        div.style.color="white";
        div.style.backgroundColor="red";
        //TODO: increase the font size
        document.getElementById('Lang').value = class_name[i].name;
    } else {
        div.style.color="white";
	div.style.backgroundColor="green";
        
    }
  }
}



function UploadFileNameChange() {
  
}

function Deactivate() {
	document.getElementById('userfile').disabled=true;
}


function BrowseMovie() {
    var show = "show";
    var browse = "";
    var upload_fail = "F";
    var movie_name = document.getElementById('UploadFileName').value;
    var year = document.getElementById('MovieYear').value;
    var genre = document.getElementById('MovieGenre').value;
    var language = document.getElementById('MovieLanguage').value;
    var file_path = document.getElementById('userfile').value; 
    
    document.getElementById('FilePath').value = file_path;
    /* File specification */
    var file = document.getElementById("userfile").files[0];
    var formdata = new FormData();
    //var param = "MovieName="+movie_name+"&year="+year+"&genre="+genre+"&language="+language+"&moviepath="+file_path;
    
    formdata.append("userfile", file);
    formdata.append("MovieName", movie_name); 
    formdata.append("MovieYear", movie_name); 
    formdata.append("MovieGenre", movie_name); 
    formdata.append("MovieLanguage", movie_name); 
    formdata.append("MoviePath", file_path); 
     

    /* XMLHTTPrequest call */
    var ajax = new XMLHttpRequest();

    if(movie_name == "") {
      /* Mandatory */
      upload_fail = "T";
    } else {
        ajax.upload.addEventListener("progress", progressHandler, false); 
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
    }
     
    formdata.append("UploadStatus", upload_fail);
    ajax.upload.addEventListener("progress", progressHandler, false); 
    ajax.open("POST", "/Movies/php/UploadMovie.php", true); 
    ajax.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {   
        document.getElementById("Uploadrectangle").innerHTML = this.responseText;         
      }
    };
    ajax.send(formdata);
}


function progressHandler(event) {
  var percent = (event.loaded / event.total) * 100;
  var elem = document.getElementById('IncreasingBar');  
  var width= Math.round(percent);
  elem.style.width = width + "%";
  elem.innerHTML = width * 1 + "%..."
}





function completeHandler(event) {
  document.getElementById("IncreasingBar").style.width="100%";
  document.getElementById("IncreasingBar").style.backgroundColor ="transparent";
  document.getElementById("IncreasingBar").innerHTML = "Uploading Successful!!";
}


function errorHandler(event) {
    document.getElementById("IncreasingBar").innerHTML = "Error !! ";
}

function abortHandler(event) {
    document.getElementById("IncreasingBar").innerHTML  = "Upload Aborted";
}

function UploadMovieFile() {
  var xmlhttp= new XMLHttpRequest();
  var show = "show";
  var browse = "";
  var upload_fail = "F";
  var movie_name = document.getElementById('UploadFileName').value;
  if(movie_name == "") {
    /* Mandatory */
    upload_fail = "T";
  }
  var year = document.getElementById('MovieYear').value;
  var genre = document.getElementById('MovieGenre').value;
  var language = document.getElementById('MovieLanguage').value;
  var file_path = document.getElementById('FilePath').value;
  var param = "MovieName="+movie_name+"&year="+year+"&genre="+genre+"&language="+language+"&moviepath="+file_path+"&show="+show+"&browse="+browse+"&upload_fail="+upload_fail;
  xmlhttp.open("POST", "/Movies/php/UploadMovie.php", true);
  xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {   
      document.getElementById("Uploadrectangle").innerHTML = this.responseText;         
    }
  };

  xmlhttp.send(param); 
}


function UploadMovie() {

  document.getElementById("rectangle").style.opacity="0.001";
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("POST", "/Movies/php/UploadMovie.php", true);
  xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {   
      document.getElementById("UploadMovie").innerHTML = this.responseText;         
    }
  };

  document.getElementById("UploadMovie").style.visibility="visible";
  
  xmlhttp.send();
}




function ExecXMLForTagging(movie_name, movie_year, file_path, language_file_path, genre_file_path) {
  var xmlhttp = new XMLHttpRequest();
  var param = "MovieName="+movie_name+"&MovieYear="+movie_year+"&File_path="+file_path+"&Language="+language_file_path+"&Genre="+genre_file_path;
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

  var movie_name = "";
  var movie_year = "";

  if(document.getElementById("FillUpInfo")) {
    movie_name = document.getElementById("MovieName").value;
    movie_year = document.getElementById('MovieYear').value;
  }

  var genre_file_path = document.getElementById("Genre").value;
  var language_file_path = document.getElementById("Lang").value;
  /* Writing the Genre and Language to file_path mentioned */
  ExecXMLForTagging(movie_name, movie_year, file_path, language_file_path, genre_file_path);
  document.getElementById("save").value = "SAVED";
}


function highlight(name) {
  document.getElementById("Romance").style.backgroundColor="red";
}

function PlayAfterTag() {
  
}
