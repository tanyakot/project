<?php


namespace App\Controller;


use App\Entity\Question;
use App\Repository\QuestionRepository;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{

//* @Route("/{page<\d+>}", name="app_homepage")

    /**
     * @Route("/questions/{page<\d+>}" , name="questions")
     */
    public function show(QuestionRepository $questionRepository, Request $request,int $page = 1 )
    {
        $queryBuilder = $questionRepository->createAskedOrderedByNewestQueryBuilder();
        $pagerfanta = new Pagerfanta(new QueryAdapter($queryBuilder));
        $pagerfanta->setMaxPerPage(1);
        $pagerfanta->setCurrentPage($page);
//        $pagerfanta->setCurrentPage($request->query->get('page', 1));

        return $this->render('question/homepage.html.twig', [
            'pager' => $pagerfanta
//            'questions' => $questions,
        ]);
    }

}