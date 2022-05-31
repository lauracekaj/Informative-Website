<?php
class Subscriber{
  private $email;

  function __construct($e){
    $this->email=$e;
  }

  function getEmail(){
    return $this->email;
  }

  function displaySubscriber(){
    echo "Subscriber e-mail:".$this->getEmail();
  }
} ?>
