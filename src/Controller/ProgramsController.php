<?php

namespace App\Controller;

use App\Data\ProgramProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProgramsController extends AbstractController
{
    #[Route('/programs', name: 'programs')]
    public function index(): Response
    {

        return $this->render('programs/index.html.twig', [
            'page_title' => 'Notre programme',
            'programs' => ProgramProvider::getAll(),
        ]);
    }
}
