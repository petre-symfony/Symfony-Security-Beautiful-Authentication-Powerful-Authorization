<?php

namespace AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface{
  private $email;
  
  public function getUsername() {
    return $this->email;
  }
  public function getRoles() {
    
  }
  public function getPassword() {
    
  }
  public function getSalt() {
    
  }
  public function eraseCredentials() {
    ;
  }
  
  public function setEmail($email) {
     $this->email = $email;
  }
}