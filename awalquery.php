<?php
include('header.php');
?>
<html>
<div align=Center>
<h2>Kata yang akan dicari</h2>
<title>Form Upload</title>
<body>
<form enctype="multipart/form-data" method="POST" action="querytf2.php">
Kata Kunci : <br>
  <input type="text" name="keyword"><br>
<input type=submit value=Submit>
</form>