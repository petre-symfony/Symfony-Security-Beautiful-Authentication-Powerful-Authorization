<?php

namespace AppBundle\Doctrine;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use AppBundle\Entity\User;

class HashPasswordListener implements EventSubscriber{
  private $passwordEncoder;
  
  public function __construct(UserPasswordEncoder $passwordEncoder) {
    $this->passwordEncoder = $passwordEncoder;  
  }

  public function getSubscribedEvents() {
    return ['prePersist', 'preUpdate'];  
  } 
  
  public function prePersist(LifecycleEventArgs $args){
    $entity = $args->getEntity();
    if (!$entity instanceof User){
      return;
    }
    
    $this->encodePassword($entity);
  }
  
  public function prUpdate(LifecycleEventArgs $args){
    $entity = $args->getEntity();
    if (!entity instanceof User){
      return;
    }
    
    $this->encodePassword($entity);
    
    //necessary to force the update to see the change
    $em = $args->getEntityManager();
    $meta = $em->getClassMetadata(get_class($entity));
    $em->getUnitOfWork()->recomputeSingleEntityChangeSet($meta, $entity);
  }
  
  /**
   * @param User $entity
   */
  private function encodePassword(User $entity) {
    if(!$entity->getPlainPassword()){
      return;
    } 
    
    $encoded = $this->passwordEncoder->encodePassword(
      $entity, 
      $entity->getPlainPassword()
    );
    $entity->setPassword($encoded);
  }
}