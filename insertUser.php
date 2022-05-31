
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <p><a href="userRegistration.html">Register</a></p>
    <p><a href="userLogIN.html">Login</a></p>
  </body>
</html>
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

if(isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["email"]) && isset($_POST["password"]))
{
    $emer=$_POST["name"];
    $mbiemer=$_POST["surname"];
    $email=$_POST["email"];
    $password=$_POST["password"];
}
$hashPassword=password_hash($password, PASSWORD_DEFAULT);

//echo $hashPassword;
add_user($pdo, $emer, $mbiemer, $email, $hashPassword);


function add_user($pdo, $e, $m, $email, $p)
{
  $statement=$pdo->prepare("INSERT INTO actor(ID, name, surname,email,password) VALUES('',:emer, :mbiemer, :email, :password)");

  if($statement->bindParam(':emer', $e, PDO::PARAM_STR, 32 )&&
      $statement->bindParam(':mbiemer', $m, PDO::PARAM_STR, 32 )&&
      $statement->bindParam(':email', $email, PDO::PARAM_STR, 32 )&&
      $statement->bindParam(':password', $p, PDO::PARAM_STR, 255 ))
{
      if($statement->execute())

            echo "<br>Insert me sukses <br>". $statement->rowCount()." perdorues i ri i rregjistruar <br>";

          else
          echo "<br>Gabim ne ekzekutim";
        }
}


?>
