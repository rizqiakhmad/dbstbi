<!DOCTYPE html>
<html>
<head>

<style>
body {margin:0;}

.topnav {
  overflow: hidden;
  background-color: #87CEFA
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }

}
</style>
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="index.php">STBI UNISBANK</a>
  <a href="upload.php">Upload</a>
  <a href="stemming.php">Pencarian Kata Dasar</a>
  <a href="query.php">Query</a>
  <a href="hitungbobot.php">Hitung Bobot</a>
  <a href="awalquery.php">Tampilkan Cache</a>
  <a href="hitungvektor.php">Hitung Vektor</a>
  <a href="download.php">Download</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<div style="padding-left:16px">
  <h2>Mata Kuliah Information Retrieval</h2>
  <p>Nama : Rizqi Akhmad Romadhoni</p>
  <p>Nim : 14.01.55.0040</p>
  <h2>Progdi : Sistem Informasi</p>
  
  <h2>Universitas Stikubank Semarang</h2>
</div>

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

</body>
</html>
