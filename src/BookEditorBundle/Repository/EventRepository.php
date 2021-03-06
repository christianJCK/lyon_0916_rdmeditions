<?php

namespace BookEditorBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;

/**
 * EventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EventRepository extends EntityRepository
{
    /**
     * @param EntityManager $em
     */
    public function deletePastEvents(EntityManager $em){
        $events = $em->getRepository('BookEditorBundle:Event')->findAll();
        //if eventDate is prior to currentDate, add the event id to pastDates
        $currentDate = new \DateTime('now');
        foreach ($events as $event){
            if($currentDate->diff($event->getDateEnd())->invert == 1){
                $em->remove($event);
            }
        }
        $em->flush();
    }

    /**
     * @param EntityManager $em
     * @return array
     */
    public function findEnabledEvents(EntityManager $em){
        $events = $em->getRepository('BookEditorBundle:Event')->findAll();
        $currentDate = new \DateTime('now');
        $enabledEvents = array();
        foreach ($events as $event){
            if($currentDate->diff($event->getDateStart())->invert == 1){
                $enabledEvents[] = $event;
            }
        }
        return $enabledEvents;
    }
}
