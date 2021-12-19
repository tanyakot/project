<?php

namespace App\Controller;

use App\Entity\Timetable;
use App\Form\TimetableType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mime\Email;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class TimetableController extends AbstractController
{
    /**
     * @Route("/timetable", name="timetable")
     */
    public function index(): Response
    {
        return $this->render('timetable/index.html.twig', [
            'controller_name' => 'TimetableController',
        ]);
    }

    /**
     * @Route("/timetable/edit", name="timetable_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, $id = 0): Response
    {
        $form = $this->createForm(TimetableType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $timetable = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($timetable);
            $entityManager->flush();

            return $this->redirectToRoute('timetable_edit', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('timetable/edit.html.twig', [
            'form' => $form,
        ]);
    }

    /**
     * @Route("/email")
     */
    public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('hello@example.com')
            ->to('tanya.kotolup@hotline.finance')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');

        $mailer->send($email);
    }
}
