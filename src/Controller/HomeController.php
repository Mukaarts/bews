<?php

namespace App\Controller;

use App\Repository\SuggestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(SuggestRepository $repository): Response
    {
        $date = new \DateTimeImmutable();
        return $this->render('home/index.html.twig', [
            'controller_name' => date_format($date, 'Y-W')
        ]);
    }
}
