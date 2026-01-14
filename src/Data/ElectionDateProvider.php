<?php

namespace App\Data;

use DateTimeImmutable;
use DateInterval;

final class ElectionDateProvider
{
    /**
     * All election dates and events
     */
    private const EVENTS = [
        'date-limite-inscription-en-ligne' => [
            'date'        => '2026-02-04',
            'title'       => 'Fin des Inscriptions sur les listes électorale en ligne',
            'description' => "Date limite pour l'inscription en ligne sur les listes électorales pour pouvoir voter aux élections municipales et communautaires des 15 et 22 mars 2026",
        ],
        'date-limite-inscription' => [
            'date'        => '2026-02-06',
            'title'       => 'Fin des inscriptions sur les listes électorales',
            'description' => "Date limite d'inscription sur les listes électorales pour pouvoir voter aux élections municipales et communautaires des 15 et 22 mars 2026."
        ],
        'ouverture-campagne' => [
            'date'        => '2026-03-02',
            'title'       => 'Ouverture de la campagne électorale',
            'description' => "",
        ],
        'cloture-campagne' => [
            'date'        => '2026-03-14',
            'title'       => 'Clôture de la campagne électorale',
            'description' => "",
        ],
        'premier-tour' => [
            'date'        => '2026-03-15',
            'title'       => 'Premier tour des éléctions',
            'description' => "",
        ],
        'deuxieme-tour' => [
            'date'        => '2026-03-22',
            'title'       => 'Deuxième tour des éléctions',
            'description' => "",
        ],
    ];

    /**
     * Get all election events with status
     *
     * @return array<int, array<string, mixed>>
     */
    public static function getAllEvents(): array
    {
        $now = new DateTimeImmutable();
        $soonInterval = new DateInterval('P7D'); // "soon" = within 7 days
        $soonDate = $now->add($soonInterval);

        $events = [];

        foreach (self::EVENTS as $key => $eventData) {
            $date = new DateTimeImmutable($eventData['date']);

            $isPast = $date < $now;
            $isToday = $date->format('Y-m-d') === $now->format('Y-m-d');
            $isSoon = $date >= $now && $date <= $soonDate;

            $events[] = [
                'key'         => $key,
                'title'       => $eventData['title'],
                'description' => $eventData['description'],
                'date'        => $date,
                'is_past'     => $isPast,
                'is_today'    => $isToday,
                'is_soon'     => $isSoon,
            ];
        }

        return $events;
    }

    /**
     * Get a single event by key
     */
    public static function getByKey(string $key): ?array
    {
        return self::EVENTS[$key] ?? null;
    }

    /**
     * Get event date as DateTimeImmutable
     */
    public static function getDate(string $key): ?DateTimeImmutable
    {
        $event = self::getByKey($key);
        return $event ? new DateTimeImmutable($event['date']) : null;
    }

    /**
     * Get event title
     */
    public static function getTitle(string $key): ?string
    {
        return self::getByKey($key)['title'] ?? null;
    }

    /**
     * Get event description
     */
    public static function getDescription(string $key): ?string
    {
        return self::getByKey($key)['description'] ?? null;
    }
}
