<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Finder\Finder;


final class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $projectDir = $this->getParameter('kernel.project_dir');

        $panoramaDir = $projectDir . '/assets/images/panorama';

        $finder = new Finder();
        $finder->files()
            ->in($panoramaDir)
            ->name(['*.jpg', '*.jpeg', '*.png', '*.webp']);

        $files = [];

        foreach ($finder as $file) {
            $files[] = $file->getFilename();
        }

        return $this->render('home/index.html.twig', [
            'page_title' => 'Vivre ensemble à La Roche-Clermault',
            'image_files' => $files
        ]);
    }

}
