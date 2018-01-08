
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
        div.style.border="10px solid green";
        document.getElementById('Genre').value = class_name[i].name;
    } else {
        div.style.border="2px solid white";
    }
  }
}

function LanguageClick(name) {
  var class_name = document.getElementsByClassName('Language');
  for(i=0; i < class_name.length;i++) {
    var div = document.getElementById(class_name[i].name);
    if(class_name[i].name == name) {
        div.style.width="250px";
	div.style.color="red";
        div.style.fontSize="35px";
        //TODO: increase the font size
        document.getElementById('Lang').value = class_name[i].name;
    } else {
        div.style.width="150px";
	div.style.color="white";
	div.style.fontSize="20px";
        
    }
  }
}



function highlight(name) {
  document.getElementById("Romance").style.backgroundColor="red";
}

function PlayAfterTag() {
  
}
