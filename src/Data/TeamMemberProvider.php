<?php

namespace App\Data;

final class TeamMemberProvider
{
    /**
     * All team members metadata
     */
    private const MEMBERS = [
        'Guillaume' => [
            'label' => 'Guillaume Lambert',
            'sublabel' => 'Enseignant au lycée Rabelais de Chinon',
            'age' => '50',
            'description' => 'Actuellement adjoint au maire, je souhaite, dans la continuité et la dynamique du travail entrepris pendant cette mandature, poursuivre mon engagement au service de La Roche-Clermault et de l\'ensemble des clérimaldien.nes',
            'position' => 1,
        ],
        'Sylvie' => [
            'label' => 'Sylvie Largeau',
            'sublabel' => 'Préparatrice en pharmacie',
            'age' => '53',
            'description' => 'Actuellement première adjointe au sein de l\'équipe municipale, je souhaite poursuivre mon engagement au service de notre commune, avec la même disponibilité, pour soutenir notre école, nos familles et la qualité de vie de tous',
            'position' => 2,
        ],
        'Loic' => [
            'label' => 'Loïc Tessier',
            'sublabel' => 'Informaticien',
            'age' => '42',
            'description' => 'Motivé par le service à la collectivité, je veux contribuer à un village solidaire, dynamique et agréable à vivre.',
            'position' => 3,
        ],
        'Christele' => [
            'label' => 'Christèle Entraigues',
            'sublabel' => 'Cadre dans un service médico-social de soutien aux aidants familiaux',
            'age' => '47',
            'description' => 'Adjointe au maire depuis 6 ans, investie depuis 10 ans dans le tissu associatif clérimaldien, je souhaite poursuivre mon engagement au service de notre commune et de ses habitants afin de porter des actions en faveur du dynamisme local et de la qualité de vie de chacun.',
            'position' => 4,
        ],
        'Fabrice' => [
            'label' => 'Fabrice Serdot',
            'sublabel' => 'Retraité EDF',
            'age' => '67',
            'description' => 'Issu d\'une famille clérimaldienne depuis de nombreuses décennies, j\'ai répondu favorablement à la sollicitation de Guillaume afin de participer à l\'avenir de la commune et partager les préoccupations de ses habitants',
            'position' => 5,
        ],
        'Elisabeth' => [
            'label' => 'Élisabeth Pillier',
            'sublabel' => 'Formatrice en Insertion Sociale auprès de personnes Infirmes',
            'age' => '50',
            'description' => 'Clérimaldienne depuis 24 ans, je me suis engagée, il y a 6 ans comme conseillère municipale. J\'ai apprécié les différents échanges, le travail lors des conseils municipaux, le contact avec les habitants, les projets à construire. C\'est pour toutes ces raisons que je m\'engage à nouveau, avec Guillaume Lambert, afin de continuer à œuvrer pour La Roche-Clermault, les Clérimaldiennes et les Clérimaldiens.',
            'position' => 6,
        ],
        'Arnault' => [
            'label' => 'Arnault Amoros',
            'sublabel' => 'Moniteur-éducateur de formation, au sein de la Fondation Léopold Bellan',
            'age' => null,
            'description' => 'J\'habite La Roche-Clermault depuis 19 ans, je me suis engagé avec Jérôme FIELD il y a 6 ans. J\'ai aimé agir, prendre des décisions pour la commune et ses administrés. J\'ai siégé au sein de la commission mobilité de la CCVVL. Fort de cette expérience, je m\'engage aujourd\'hui avec Guillaume LAMBERT pour continuer à travailler sur la mobilité et contribuer à la mise en place de nouveaux projets pour notre commune et ses citoyens.',
            'position' => 7,
        ],
        'Helene' => [
            'label' => 'Hélène Blanquart',
            'sublabel' => 'Orthophoniste',
            'age' => '44',
            'description' => 'Je souhaite me mettre au service de la qualité de vie et de l\'environnement des clérimaldien•nes de tous âges.',
            'position' => 8,
        ],
        'Francois' => [
            'label' => 'François Bel',
            'sublabel' => 'Retraité de l\'enseignement et de l\'INRA',
            'age' => '82',
            'description' => 'Je souhaite poursuivre mon engagement pour la planète et ses habitants, en particulier ceux de ma commune',
            'position' => 9,
        ],
        'Laurence' => [
            'label' => 'Laurence Vincent-Hucault',
            'sublabel' => null,
            'age' => null,
            'description' => 'Née ici, j\'ai grandi dans ce village, aujourd\'hui je souhaite m\'engager pour son avenir et celui de ses habitants.',
            'position' => 10,
        ],
        'Fabio' => [
            'label' => 'Fabio Hadjimanuel',
            'sublabel' => 'Professeur des écoles',
            'age' => '34',
            'description' => 'Pour moi, le vivre-ensemble est le ciment de notre société ! Collectivement, faisons briller notre commune autour de projets solidaires, fédérateurs et innovants, dans un esprit de fraternité.',
            'position' => 11,
        ],
        'Anne-Laurence' => [
            'label' => 'Anne-Laurence Berruet',
            'sublabel' => 'Infirmière',
            'age' => '41',
            'description' => 'J\'habite à la Roche-Clermault avec ma famille depuis 10 ans. Mon métier m\'a appris l\'importance de l\'écoute et de l\'entraide. Aujourd\'hui, je souhaite mettre mon énergie au service de notre village pour porter des projets tournés vers le bien-être des citoyens et la solidarité de proximité.',
            'position' => 12,
        ],
        'Noel' => [
            'label' => 'Noël Proust',
            'sublabel' => 'Retraité',
            'age' => '65',
            'description' => 'J\'aime ma commune et souhaite m\'investir.',
            'position' => 13,
        ],
        'Louise' => [
            'label' => 'Louise Wallart',
            'sublabel' => 'Psychologue',
            'age' => '36',
            'description' => 'Je suis attachée à notre village et souhaite participer à la réflexion commune et aux projets pour le faire vivre et évoluer.',
            'position' => 14,
        ],
        'Pascal' => [
            'label' => 'Pascal Jacques',
            'sublabel' => 'Retraité',
            'age' => '63',
            'description' => 'Résident à La Roche-Clermaut depuis 2023, j\'ai choisi de retrouver les valeurs de la ruralité. Chaleureusement accueilli par les Clérimaldiens, je souhaite consacrer en retour du temps à cette collectivité Rabelaisienne.',
            'position' => 15,
        ],
        'Julie' => [
            'label' => 'Julie Mathé',
            'sublabel' => 'Gestionnaire eau et assainissement',
            'age' => '40',
            'description' => 'Présidente du comité des fêtes depuis 2 ans, je souhaite m\'investir pleinement pour l\'animation de la commune et le bien-être de ses habitants.',
            'position' => 16,
        ],
        'Baptiste' => [
            'label' => 'Baptiste Boutier',
            'sublabel' => 'Restaurateur',
            'age' => '33',
            'description' => 'Je suis restaurateur à mon compte. Je me suis engagé sur la liste pour m\'investir davantage dans la vie de notre commune',
            'position' => 17,
        ],
    ];

    /**
     * Get team member data by folder name
     */
    public static function getByFolder(?string $folderName): ?array
    {
        if ($folderName === null) {
            return null;
        }

        return self::MEMBERS[$folderName] ?? null;
    }

    /**
     * Get label (full name) for a team member
     */
    public static function getLabel(?string $folderName): ?string
    {
        return self::getByFolder($folderName)['label'] ?? null;
    }

    /**
     * Get sublabel (profession/role) for a team member
     */
    public static function getSublabel(?string $folderName): ?string
    {
        return self::getByFolder($folderName)['sublabel'] ?? null;
    }

    /**
     * Get age for a team member
     */
    public static function getAge(?string $folderName): ?string
    {
        return self::getByFolder($folderName)['age'] ?? null;
    }

    /**
     * Get description for a team member
     */
    public static function getDescription(?string $folderName): ?string
    {
        return self::getByFolder($folderName)['description'] ?? null;
    }

    /**
     * Get position (order) for a team member
     */
    public static function getPosition(?string $folderName): ?int
    {
        return self::getByFolder($folderName)['position'] ?? null;
    }
}
