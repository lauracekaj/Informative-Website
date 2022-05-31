<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="userLogIN.html">Log In</a>
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


//kontrollo nese perdoruesi ka vendosur ndonje vlere per fushat
if(isset($_POST['email'])&&isset($_POST['password']))
{
    //gjej perdoruesin qe ka email te njejte me ate te vendosur nga perdoruesi
    $psw_temp=$_POST['password'];
    $row=find_user($pdo, $_POST['email']);

    if(!$row)
     echo "Error on query execution! No user found";
     else
      //nxjerrim te dhenat per perdoruesin e gjetur
      {
        $emer=$row['name'];
        $mbiemer=$row['surname'];
        $password=$row['password'];

        //i krahasojme password me ate futur nga perdoruesi
        if(password_verify($psw_temp, $password))
            echo "$emer $mbiemer: Hi $emer!";
        else
            die("Invalid password");
      }

}

else {
      die("Enter the username and password");
    }

function find_user($pdo, $e)
{
  $statement=$pdo->prepare("SELECT * FROM actor where email=:email");

  if($statement->bindParam(":email", $e, PDO::PARAM_STR, 32))
  {
    if($statement->execute())
      return $statement->fetch(PDO::FETCH_ASSOC);

    else
        return false;
  }
  else
    return false;

}
