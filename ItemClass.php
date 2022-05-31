<?php
class Item{
  //class properties
      private $itemName;
      private $itemDescription;
      private $image;
      //constructor
      function __construct($iN, $iD, $i)
      {//to validate input data

        $this->itemName=$iN;
        $this->itemDescription=$iD;
        $this->image=$i;

      }

      function getItemName(){ return $this->itemName; }
      function getItemDescription(){ return $this->itemDescription; }
      function getImage(){
          echo "<img src='$this->image' alt='Image to be displayed' style='margin:20px;'>";
       }

      function toString()
      {
        echo "Item Name:". $this->getItemName(). "<br>";
        echo "Item Description :". $this->getItemDescription(). "<br>";
        echo $this->getImage();
      }

}



 ?>
