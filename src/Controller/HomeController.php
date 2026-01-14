<?php

namespace App\Controller;

use App\Data\ProgramProvider;
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
            $folderName = $file->getRelativePath(); // Récupère le nom du dossier

            $files[] = [
                'rootPath'   => 'images/panorama',
                'folderName' => $folderName,
                'filename'   => $file->getFilename(),
                'realname'   => null,
            ];
        }

        dump(ProgramProvider::getRandomPrograms(3));

        return $this->render('home/index.html.twig', [
            'page_title' => 'Vivre ensemble à La Roche-Clermault',
            'image_files' => $files,
            'programs' => ProgramProvider::getRandomPrograms(3),
        ]);
    }


    #[Route('/legal_mentions', name: 'legal_mentions')]
    public function legal(): Response
    {
        return $this->render('home/legal.html.twig', [
            'page_title' => 'Mentions légales',
        ]);
    }

    #[Route('/privacy_policy', name: 'privacy_policy')]
    public function privacy_policy(): Response
    {
        return $this->render('home/privacy_policy.html.twig', [
            'page_title' => 'Mentions légales',
        ]);
    }

}
