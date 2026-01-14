<?php

namespace App\Controller;

use App\Data\ElectionDateProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


final class ElectionController extends AbstractController
{
    #[Route('/elections', name: 'elections')]
    public function index(): Response
    {
        return $this->render('elections/index.html.twig', [
            'page_title' => 'Les élections de Mars 2026',
            'events'     => ElectionDateProvider::getAllEvents(),
        ]);
    }
}
