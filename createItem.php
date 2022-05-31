<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<?php
require_once("ItemClass.php");


if(isset($_POST['ItemName'])&&
   isset($_POST['ItemDescription'])&&
   isset($_POST['Image'])  )

   {
     $i=new Item($_POST['ItemName'],$_POST['ItemDescription'],
       $_POST['Image'] );

       $i->toString();
   }
?>
</body>
</html>
