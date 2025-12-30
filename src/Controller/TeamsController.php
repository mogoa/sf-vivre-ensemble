<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TeamsController extends AbstractController
{
    #[Route('/teams', name: 'teams')]
    public function index(): Response
    {
        return $this->render('teams/index.html.twig', [
           'page_title' => 'Notre équipe',
        ]);
    }
}
