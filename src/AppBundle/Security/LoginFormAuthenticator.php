<?php

namespace AppBundle\Security;

use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class LoginFormAuthenticator extends AbstractFormLoginAuthenticator{
  public function getCredentials(Request $request){
    $isLoginSubmit = $request->getPathInfo() == '/login' && $request->isMethod('POST');
    IF (!$isLoginSubmit){
      //skip authentication
      return;
    }
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
