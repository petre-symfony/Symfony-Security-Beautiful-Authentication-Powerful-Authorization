<?php

namespace AppBundle\Security;

use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Form\FormFactoryInterface;
use AppBundle\Form\LoginForm;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Routing\RouterInterface;

class LoginFormAuthenticator extends AbstractFormLoginAuthenticator{
  private $formFactory;
  private $em; 
  private $router;


  public function __construct(FormFactoryInterface $formFactory, EntityManager $em, RouterInterface $router) {
    $this->formFactory = $formFactory;
    $this->em = $em;
    $this->router = $router;
  }


  public function getCredentials(Request $request){
    $isLoginSubmit = $request->getPathInfo() == '/login' && $request->isMethod('POST');
    if (!$isLoginSubmit){
      //skip authentication
      return;
    }
    
    $form = $this->formFactory->create(LoginForm::class);
    $form->handleRequest($request);
    
    $data = $form->getData();
    
    return $data;
  }
  
  public function getUser($credentials, UserProviderInterface $userProvider) {
    $username = $credentials['_username'];
    
    return $this->em->getRepository('AppBundle:User')->findOneBy(['email' => $username]);
  }
  
  public function checkCredentials($credentials, \UserInterface $user) {
    $password = $credentials['_password'];
    
    if ($password == 'iliketurtles'){
      return true;
    }
    
    return false;
  }
  
  public function getLoginUrl() {
    return $this->router->generate('security_login');  
  }
  
  public function getDefaultSuccessRedirectUrl() {
    
  }
}
