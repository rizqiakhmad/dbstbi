<?php
 include('header.php');
 ?>
<html>
<div align=Center>
<h2>Download File</h2>
<title>Aplikasi Download</title>
<body>
<?php
  $konek = mysqli_connect("localhost","root","","dbstbi");

  $query = "SELECT * FROM upload ORDER BY id_upload DESC";
  $hasil = mysqli_query($konek, $query);

  while ($r = mysqli_fetch_array($hasil)){
    echo "Nama File : <b>$r[nama_file]</b> <br>";
    echo "Deskripsi : $r[deskripsi] <br>";
    echo "<a href=\"simpan.php?file=$r[nama_file]\">Download File</a><hr><br>";
  }
?>
