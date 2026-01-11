<?php

namespace App\Enum;

use DateTimeImmutable;

enum ElectionDate: string
{
    case DATE_LIMITE_INSCRIPTION_EN_LIGNE   = 'date-limite-inscription-en-ligne';
    case DATE_LIMITE_INSCRIPTION        = 'date-limite-inscription';
    case OUVERTURE_CAMPAGNE  = 'ouverture-campagne';
    case CLOTURE_CAMPAGNE    = 'cloture-campagne';
    case PREMIER_TOUR    = 'premier-tour';
    case DEUXIEME_TOUR    = 'deuxieme-tour';

    private const DATA = [
        self::DATE_LIMITE_INSCRIPTION_EN_LIGNE->value => [
            'date'        => '2026-02-04',
            'title'       => 'Fin des Inscriptions sur les listes électorale en ligne',
            'description' => "Date limite pour l'inscription en ligne sur les listes électorales pour pouvoir voter aux élections municipales et communautaires des 15 et 22 mars 2026",
        ],
        self::DATE_LIMITE_INSCRIPTION->value => [
            'date'        => '2026-02-06',
            'title'       => 'Fin des inscriptions sur les listes électorales',
            'description' => "Date limite d'inscription sur les listes électorales pour pouvoir voter aux élections municipales et communautaires des 15 et 22 mars 2026."
        ],
        self::OUVERTURE_CAMPAGNE->value => [
            'date'        => '2026-03-02',
            'title'       => 'Ouverture de la campagne électorale',
            'description' => "",
        ],
        self::CLOTURE_CAMPAGNE->value => [
            'date'        => '2026-03-14',
            'title'       => 'Clôture de la campagne électorale',
            'description' => "",
        ],
        self::PREMIER_TOUR->value => [
            'date'        => '2026-03-15',
            'title'       => 'Premier tour des éléctions',
            'description' => "",
        ],
        self::DEUXIEME_TOUR->value => [
            'date'        => '2026-03-22',
            'title'       => 'Deuxième tour des éléctions',
            'description' => "",
        ],
    ];

    public function date(): DateTimeImmutable
    {
        return new DateTimeImmutable(self::DATA[$this->value]['date']);
    }

    public function title(): string
    {
        return self::DATA[$this->value]['title'];
    }

    public function description(): string
    {
        return self::DATA[$this->value]['description'];
    }

    public function toArray(): array
    {
        return [
            'key'         => $this->value,
            'date'        => $this->date(),
            'title'       => $this->title(),
            'description' => $this->description(),
        ];
    }
}
