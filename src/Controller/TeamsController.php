<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Finder\Finder;

final class TeamsController extends AbstractController
{
    #[Route('/teams', name: 'teams')]
    public function index(): Response
    {
        $projectDir = $this->getParameter('kernel.project_dir');

        $photoDir = $projectDir . '/assets/images/photo_équipe';

        $finder = new Finder();
        $finder->files()
            ->in($photoDir)
            ->name(['*.jpg', '*.jpeg', '*.png', '*.webp', '*.JPEG']);

        $files = [];

        foreach ($finder as $file) {
            $files[] = $file->getFilename();
        }

        return $this->render('teams/index.html.twig', [
            'page_title' => 'Notre équipe',
            'image_files' => $files
        ]);
    }
}
