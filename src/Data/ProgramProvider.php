<?php

namespace App\Data;

final class ProgramProvider
{
    /**
     * Get all programs
     *
     * @return array<int, array<string, mixed>>
     */
    public static function getAll(): array
    {
        return [
            [
                "name" => "La jeunesse est au cœur de notre projet",
                "contents" => [
                    "Nous créerons une <b>junior association</b> pour consulter les jeunes et les associer aux décisions qui les concernent.",
                    "L'école sera placée au centre de notre action."
                ],
                "icon" => "fa-child"
            ],
            [
                "name" => "Une vie locale dynamique et solidaire",
                "contents" => [
                    "Les associations sont le poumon de notre village",
                    "Nous créerons et mettrons à leur disposition un <b>local associatif sur le terrain municipal</b> à la fois pour stocker le matériel et disposer d'une <b>buvette</b> pour animer nos événements.",
                    "Nous développerons aussi des <b>projets intergénérationnels</b>, par exemple autour du numérique, pour renforcer les liens entre tous les habitants.",
                    "Nous souhaitons développer un site web de la commune pour informer les habitantes et habitants."
                ],
                "icon" => "fa-house"
            ],
            [
                "name" => "Attractivité et soutien à l'économie locale",
                "contents" => [
                    "Artisans, commerçants, agriculteurs, entrepreneurs : vous êtes essentiels à la vitalité de notre commune. Nous vous accompagnerons pour développer vos activités et attirer de nouveaux talents.",
                    "Nous engagerons une réflexion pour la création de nouveaux logements ou la réhabilitation de logements anciens"
                ],
                "icon" => "fa-briefcase"
            ],
            [
                "name" => "Écologie et cadre de vie",
                "contents" => [
                    "Nous accompagnerons l'intercommunalité dans le développement des mobilités douces.",
                    "Nous poursuivrons l'approvisionnement de la cantine en produits locaux",
                    "Nous soutiendrons les deux cogestionnaires du <b>Marais de Taligny</b>, le Parc Naturel Loire Anjou Touraine et la communauté de communes Chinon Vienne et Loire, pour valoriser et promouvoir la réserve naturelle régionale",
                    "Nous souhaitons retravailler les entrées de bourg pour embellir notre village.",
                    "Nous organiserons des opérations de nettoyage de la commune."
                ],
                "icon" => "fa-seedling"
            ],
            [
                "name" => "Culture",
                "contents" => [
                    "Nous souhaitons promouvoir la culture en organisant des concerts, et en poursuivant les spectacles estivaux (cinéma ou pièce de théâtre en plein air) en partenariat  avec la communauté de communes.",
                    "Nous voudrions travailler sur « la mémoire » de La Roche-Clermault, en recueillant les souvenirs de nos ainé.e.s.",
                ],
                "icon" => "fa-book-open"
            ],
            [
                "name" => "Communauté de communes",
                "contents" => [
                    "Nous souhaitons défendre la position des communes rurales et faire entendre la voie de La Roche-Clermault au sein des instances de  la communauté de communes Chinon Vienne et Loire",
                ],
                "icon" => "fa-city"
            ],
        ];
    }

    /**
     * Get a program by index
     */
    public static function getByIndex(int $index): ?array
    {
        $programs = self::getAll();
        return $programs[$index] ?? null;
    }

    /**
     * Get the count of all programs
     */
    public static function count(): int
    {
        return count(self::getAll());
    }

    /**
     * get 3 random programs
     */
    public static function getRandomPrograms(int $count = 3): array
    {
        $programs = self::getAll();
        shuffle($programs);
        return array_slice($programs, 0, $count);
    }
}
