
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
  var xmlhttp = new XMLHttpRequest();
  var movie_path = path.split("#?")[0];
  var movie_name = (path.split("#?")[1]).replace("&", " ");
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
  if(( (document.getElementById("Genre").value == "dontknow") && !(document.getElementById("Language").value == "dontknow") ) || (!(document.getElementById("Genre").value == "dontknow") && (document.getElementById("Language").value == "dontknow"))) {
    document.getElementById("hidebox").style.display = "block";
  } else {
      document.getElementById("hidebox").style.display = "none";
  }

}
