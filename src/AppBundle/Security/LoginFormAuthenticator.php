<?php

namespace AppBundle\Security;

use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Form\FormFactoryInterface;
use AppBundle\Form\LoginForm;

class LoginFormAuthenticator extends AbstractFormLoginAuthenticator{
  private $formFactory;


  public function __construct(FormFactoryInterface $formFactory) {
    $this->formFactory = $formFactory;
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
    ;
  }
  
  public function checkCredentials($credentials, \UserInterface $user) {
    ;
  }
  
  public function getLoginUrl() {
    
  }
  
  public function getDefaultSuccessRedirectUrl() {
    
  }
}
