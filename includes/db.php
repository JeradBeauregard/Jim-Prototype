<?php
  $connect = mysqli_connect('localhost', 'root', 'root', 'jim_prototype');
  
  if(!$connect){
    die("Connection Failed: " . mysqli_connect_error());
  }

  ?>