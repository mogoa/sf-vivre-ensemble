<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Finder\Finder;
use App\Enum\TeamMember;

final class TeamsController extends AbstractController
{
    #[Route('/teams', name: 'teams')]
    public function index(): Response
    {
        $projectDir = $this->getParameter('kernel.project_dir');
        $photoDir = $projectDir . '/assets/images/photo_equipe';

        $finder = new Finder();
        $finder->files()
            ->in($photoDir)
            ->name(['*.jpg', '*.jpeg', '*.png', '*.webp', '*.JPEG']);



        foreach ($finder as $file) {
            $folderName = $file->getRelativePath(); // Récupère le nom du dossier

            $realName = TeamMember::labelForFolder($folderName) ?? $folderName;

            $files[] = [
                'rootPath'   => 'images/photo_equipe',
                'folderName' => $folderName,
                'filename'   => $file->getFilename(),
                'realname'   => $realName,
            ];
        }

        shuffle($files);

        return $this->render('teams/index.html.twig', [
            'page_title' => 'Notre équipe',
            'image_files' => $files
        ]);
    }
}
