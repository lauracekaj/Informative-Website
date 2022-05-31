<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Show All Users</title>
    <style media="screen">
      label{
        cursor:pointer;
        color:blue;
      }
    </style>
  </head>
  <body>
    <?php

    require_once "../FirstDatabase/login.php";



     try{
        $pdo=new PDO($attribute, $user, $password);
        echo "Lidhja u krye me sukses <br>";
    }

    catch(PDOException $e)
    {
      echo "Lidhja nuk u krye, ndodhi nje gabim $e->getMessage() dhe ka nr $e->getCode()";
    }

     ?>

     <?php
      $query= "SELECT ID, name, surname, email, password FROM actor";
      $result=$pdo->query($query);

      while($row=$result->fetch(PDO::FETCH_BOTH))
      {
        echo "<br>Name: ".$row["name"]."<br>";
        echo "Surname: ".$row["surname"]."<br>";
        echo "Email: ".$row["email"]."<br>";
        echo "Password: ".$row["password"]."<br>";
        echo <<<_OUT

        <form method='post' action='viewDetails.php'>
           <input type='text' name='id' value='$row[0]' hidden='hidden'>
           <label>View Details
          <input type='submit' hidden='hidden'>
            </label>
        </form>

        _OUT;


        echo "-------------------------------";
      }

$pdo=null;
      ?>
  </body>
</html>
