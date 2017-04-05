<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\User;

class UserRegistrationForm extends AbstractType {
  
  public function buildForm(FormBuilderInterface $builder, array $options) {
    
  }
  
  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefaults([
      'data_class' => User::class    
    ]);  
  }
}
