
function MoviePlay(path, name) {
  var xmlhttp = new XMLHttpRequest();
  var param = "movie_path="+path;
  xmlhttp.open("POST", "/Movies/php/PlayVideo.php", true);
  xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("InnerBox").innerHTML = this.responseText;       
    }
  };
  xmlhttp.send(param);  
}


