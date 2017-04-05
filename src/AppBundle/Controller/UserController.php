<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\UserRegistrationForm;
use AppBundle\Entity\User;

class UserController extends Controller{
  /**
   * @ROUTE("/register", name="user_register")
   */
  public function registerAction(Request $request){
    $form = $this->createForm(UserRegistrationForm::class);  
    
    $form->handleRequest($request);
    if($form->isValid()){
      /** @var User $user */
      $user = $form->getData();
      $em = $this->getDoctrine()->getManager();
      $em->persist($user);
      $em->flush();
      
      $this->addFlash('success', 'Welcome '.$user->getEmail());
      
      return $this->get('security.authentication.guard_handler')->authenticateUserAndHandleSuccess(
        $user,
        $request,
        $this->get('app.security.login_form_authenticator'),
        'main'      
      );
    }
    
    return $this->render('user/register.html.twig', [
      'form' => $form->createView()    
    ]);
  }
}