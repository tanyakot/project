<?php


namespace App\MessageHandler;


use App\Message\Event\TestEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class TestHandler
{
    private $entityManager;
    private $eventBus;

    public function __construct(MessageBusInterface $eventBus, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->eventBus = $eventBus;

    }

    public function __invoke(ArticleMessage $articleMessage)
    {
        $this->eventBus->dispatch(new TestEvent('Taras'));
//        $article = $this->entityManager->getRepository(Article::class)->find(14);
//        $article->setName('99999999999999999');
//        $this->entityManager->persist($article);
//        $this->entityManager->flush();
//        if($this->logger) {
//            $this->logger->alert(sprintf('id %d not', $articleMessage->getArticleId()));
//        }
//        return;
    }

}