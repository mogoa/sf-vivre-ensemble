<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Enum\ElectionDate;
use DateTimeImmutable;
use DateInterval;


final class ElectionController extends AbstractController
{
    #[Route('/elections', name: 'elections')]
    public function index(): Response
    {

$now = new DateTimeImmutable();
        $soonInterval = new DateInterval('P7D'); // "bientôt" = dans les 7 jours

        $events = [];

        foreach (ElectionDate::cases() as $eventEnum) {
            $date = $eventEnum->date();

            $isPast    = $date < $now;
            $isToday   = $date->format('Y-m-d') === $now->format('Y-m-d');
            $isSoon    = $date >= $now && $date <= $now->add($soonInterval);

            $events[] = [
                'key'         => $eventEnum->value,
                'title'       => $eventEnum->title(),
                'description' => $eventEnum->description(),
                'date'        => $date,
                'is_past'     => $isPast,
                'is_today'    => $isToday,
                'is_soon'     => $isSoon,
            ];
        }

        return $this->render('elections/index.html.twig', [
            'page_title' => 'Les élections de Mars 2026',
            'events'     => $events,
        ]);
    }
}
