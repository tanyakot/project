<?php


namespace App\Controller;


use App\Repository\AnswerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AnswerController extends AbstractController
{
    /**
     * @Route("/answers/popular", name="app_popular_answers")
     */
    public function popularAnswers(AnswerRepository $answerRepository)
    {
        $answers = $answerRepository->findMostPopular();

        return $this->render('answer/popularAnswers.html.twig', [
            'answers' => $answers
        ]);
    }

}