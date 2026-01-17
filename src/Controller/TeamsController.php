<?php

namespace App\Controller;

use App\Data\TeamMemberProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Finder\Finder;

final class TeamsController extends AbstractController
{

    #[Route('/teams', name: 'teams', options: ['sitemap' => true])]
    public function index(): Response
    {
        $projectDir = $this->getParameter('kernel.project_dir');
        $photoDir = $projectDir . '/assets/images/photo_equipe';
        $thumbs=[];

        $finder = new Finder();
        $finder->files()
            ->in($photoDir)
            ->name(['*.jpg', '*.jpeg', '*.png', '*.webp', '*.JPEG']);

        foreach ($finder as $file) {
            $folderName = $file->getRelativePath(); // Récupère le nom du dossier
            $realName = TeamMemberProvider::getLabel($folderName) ?? $folderName;

            if ($file->getFilename() === '1.jpeg') {
                $thumbs[] = $this->createThumbnails($file);
            }

            $carouselFiles[] = [
                'rootPath'   => 'images/photo_equipe',
                'folderName' => $folderName,
                'filename'   => $file->getFilename(),
                'realname'   => $realName,
            ];
        }

        shuffle($carouselFiles);

        array_multisort (array_column($thumbs, 'position'), SORT_ASC, $thumbs);
        return $this->render('teams/index.html.twig', [
            'page_title' => 'Notre équipe',
            'image_files' => $carouselFiles,
            'thumbs' => $thumbs
        ]);
    }


    /**
     * @param \Symfony\Component\Finder\SplFileInfo $file
     */
    private function createThumbnails($file): array
    {
        $folderName = $file->getRelativePath(); // Récupère le nom du dossier
        return [
            'rootPath'   => 'images/photo_equipe',
            'folderName' => $folderName,
            'filename'   => $file->getFilename(),
            'realname'   => TeamMemberProvider::getLabel($folderName) ?? $folderName,
            'description' => TeamMemberProvider::getDescription($folderName),
            'age'        => TeamMemberProvider::getAge($folderName),
            'position'   => TeamMemberProvider::getPosition($folderName),
            'sublabel'   => TeamMemberProvider::getSublabel($folderName),
        ];
    }
}
