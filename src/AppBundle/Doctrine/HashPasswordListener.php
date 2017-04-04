<?php

namespace AppBundle\Doctrine;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;

class HashPasswordListener implements EventSubscriber{
  public function getSubscribedEvents() {
    return ['prePersist', 'preUpdate'];  
  } 
  
  public function prePersist(LifecycleEventArgs $args){
    $entity = $args->getEntity();
    if (!$entity instanceof User){
      return;
    }
  }
}