<?php


namespace App\Controller;


use App\Entity\Question;
use App\Repository\AnswerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    /**
     * @Route("/questions/{id}", name="questions")
     */
    public function show(Question $question, AnswerRepository $answerRepository)
    {
        $answers = $answerRepository->findBy(['question' => $question]);
        $a = $answerRepository->findAllApproved(1);

//        $answers = $question->getAnswers();
//        $ar = $question->getApprovedAnswers();
  //      foreach ($answers as $answer) {
    //        dump($answer);
      //  }
    }

}