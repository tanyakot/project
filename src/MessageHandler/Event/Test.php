<?php


namespace App\MessageHandler\Event;


use App\Message\Event\TestEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class Test implements MessageHandlerInterface
{
    private $entityManager;
    private $eventBus;

    public function __construct(EntityManagerInterface $entityManager, MessageBusInterface $eventBus)
    {
        $this->entityManager = $entityManager;
        $this->eventBus = $eventBus;
    }

    public function __invoke(TestEvent $event)
    {
        $event->getFilename();
    }
}