<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\UserRegistrationForm;

class UserController extends Controller{
  /**
   * @ROUTE("/register", name="user_register")
   */
  public function registerAction(Request $request){
    $form = $this->createForm(UserRegistrationForm::class);  
    
    return $this->render('user/register.html.twig', [
      'form' => $form->createView()    
    ]);
  }
}