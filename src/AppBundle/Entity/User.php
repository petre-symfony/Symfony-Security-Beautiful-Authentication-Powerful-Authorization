<?php

namespace AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements UserInterface{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="integer")
   */
  private $id;
  
  /**
   * @ORM\Column(type="string", unique=true)
   */
  private $email;
  
  /**
   * The encoded password
   * 
   * @ORM\Column(type="string")
   * 
   */
  private $password;
  
  /**
   * A non-persisted field that's used to create the encoded password
   * 
   * @var string
   */
  private $plainPassword;
  
  public function getUsername() {
    return $this->email;
  }
  public function getRoles() {
    return ['ROLE_USER'];
  }
  public function getPassword() {
    return $this->password;  
  }
  public function setPassword($password){
    $this->password = $password;
  }
  public function getPlainPassword(){
    return $this->plainPassword;
  }
  public function setPlainPassword($plainPassword){
    return $this->plainPassword = $plainPassword;
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