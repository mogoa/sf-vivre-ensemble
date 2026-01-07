<?php

namespace App\Enum;

enum TeamMember: string
{
    case ANNE_LAURENCE = 'Anne-Laurence';
    case ARNAULT = 'Arnault';
    case BAPTISTE = 'Baptiste';
    case CHRISTELLE = 'Christelle';
    case ELISABETH = 'Elisabeth';
    case FABIO = 'Fabio';
    case FABRICE = 'Fabrice';
    case FRANCOIS = 'Francois';
    case GUILLAUME = 'Guillaume';
    case HELENE = 'Helene';
    case JULIE = 'Julie';
    case LAURENCE = 'Laurence';
    case LOIC = 'Loic';
    case LOUISE = 'Louise';
    case NOEL = 'Noel';
    case PASCAL = 'Pascal';
    case SYLVIE = 'Sylvie';


 /** Map dossier -> label humain */
    private const LABELS = [
            self::ANNE_LAURENCE->value => 'Anne-Laurence Berruet',
            self::ARNAULT->value => 'Arnault Amoros',
            self::BAPTISTE->value => 'Baptiste Boutier',
            self::CHRISTELLE->value => 'Christelle Entraigues',
            self::ELISABETH->value => 'Elisabeth Pillier',
            self::FABIO->value => 'Fabio Hadjimanuel',
            self::FABRICE->value => 'Fabrice Serdot',
            self::FRANCOIS->value => 'François Bel',
            self::GUILLAUME->value => 'Guillaume Lambert',
            self::HELENE->value => 'Hélène Blanquart',
            self::JULIE->value => 'Julie Mathé',
            self::LAURENCE->value => 'Laurence Vincent-Hucault',
            self::LOIC->value => 'Loïc Tessier',
            self::LOUISE->value => 'Louise Wallart',
            self::NOEL->value => 'Noël Proust',
            self::PASCAL->value => 'Pascal Jaqcues',
            self::SYLVIE->value => 'Sylvie Largeau',
    ];


    public function label(): string
    {
        return self::LABELS[$this->value] ?? $this->value;
    }

    public static function tryFromFolder(?string $folder): ?self
    {
        if ($folder === null) {
            return null;
        }

        // Si le dossier correspond exactement à une valeur de l’Enum
        return self::tryFrom($folder);
    }

    public static function labelForFolder(?string $folder): ?string
    {
        $member = self::tryFromFolder($folder);

        return $member?->label();
    }
}
