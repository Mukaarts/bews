<?php

namespace App\Controller;

use App\Entity\Suggest;
use App\Form\SuggestType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuggestController extends AbstractController
{
    #[Route('/suggest', name: 'suggest')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $suggest = new Suggest();

        $form = $this->createForm(SuggestType::class, $suggest);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $suggest = $form->getData();

            $entityManager->persist($suggest);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->renderForm('suggest/index.html.twig', [
            'controller_name' => 'Suggest',
            'form' => $form
        ]);
    }
}
