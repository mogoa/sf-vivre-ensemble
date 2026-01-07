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
            $folderName = $file->getRelativePath(); // Récupère le nom du dossier

            $files[] = [
                'rootPath'   => 'images/panorama',
                'folderName' => $folderName,
                'filename'   => $file->getFilename(),
                'realname'   => null,
            ];
        }
        //dd($files);

        $programs = [
            [
                'name' => 'Attractivité',
                'content' => 'Apporter une nouvelle dynamique à notre ville en valorisant son patrimoine et en soutenant les initiatives locales.',
                'icon' => 'fa-city'
            ],
            [
                'name' => 'Logement',
                'content' => 'Engagé à améliorer l\'accès au logement pour tous les habitants de La Roche-Clermault.',
                'icon' => 'fa-house'
            ],
            [
                'name' => 'La jeunesse',
                'content' => 'promouvoir des activités et des espaces dédiés aux jeunes pour favoriser leur épanouissement.',
                'icon' => 'fa-child'
            ],
        ];

        return $this->render('home/index.html.twig', [
            'page_title' => 'Vivre ensemble à La Roche-Clermault',
            'image_files' => $files,
            'programs' => $programs,
        ]);
    }

}
