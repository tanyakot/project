<?php


namespace App\MessageHandler;


use App\Entity\Article;
use App\Message\ArticleMessage;
use App\Message\StudentMessage;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class StudentMessageHandler implements MessageHandlerInterface, LoggerAwareInterface
{
    use LoggerAwareTrait;
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(StudentMessage $studentMessage)
    {
        $article = $this->entityManager->getRepository(Article::class)->find(14);
        $article->setName('9898989898');
        $this->entityManager->persist($article);
        $this->entityManager->flush();
        if($this->logger) {
            $this->logger->alert(sprintf('id %d not', $articleMessage->getArticleId()));
        }
        return;
    }

}