<?php

namespace AppBundle\Doctrine;

use Doctrine\Common\EventSubscriber;

class HashPasswordListener implements EventSubscriber{
  public function getSubscribedEvents() {
    return ['prePersist', 'preUpdate'];  
  }  
}