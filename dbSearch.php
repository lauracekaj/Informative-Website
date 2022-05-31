<?php
mysql_connect("localhost", "root", "password") or die("Could not connect");
mysql_select_db("project") or die("Could not find");
$output = '';

if(isset($_POST['search'])){
  $search = $_POST['search'];

  $query = mysql_query("SELECT * FROM products WHERE name LIKE '%$search%'") or die("Could not search");
  $count = mysql_num_rows($query);
  if($count == 0){
    $output = 'There was no search results!';
  }

  else{
    while($row = mysql_fetch_array($query)){
      $name = $row['name'];

      $output .= '<div>' .$name. '</div>';
    }
  }
}
print ("$output");
 ?>
