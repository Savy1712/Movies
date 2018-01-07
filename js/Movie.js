
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
  // Replace all the occurences -> /g/ 
  var movie_name = movie_name_with_amb.replace(/&/g, " ");
  // TODO: Get the Language and Genre if filled.
  // TODO: Make Language to be 2 and Genre to be 3 based on Length of "path.split"
  var param = "movie_path="+movie_path+"&movie_name="+movie_name;
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

function highlight(name) {
  document.getElementById("Romance").style.backgroundColor="red";
}

function PlayAfterTag() {
  
}
