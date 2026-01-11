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
            self::GUILLAUME->value => [
                'label' => 'Guillaume Lambert',
                'age' => '42',
                'description' => 'loremipssumdolorsitamet',
                'position' => '1'],

            self::SYLVIE->value => [
                'label' => 'Sylvie Largeau',
                'age' => '42',
                'description' => 'loremipssumdolorsitamet',
                'position' => '2'],

            self::LOIC->value => [
                'label' => 'Loïc Tessier',
                'age' => '42',
                'description' => 'loremipssumdolorsitamet',
                'position' => '3'],

            self::CHRISTELLE->value => [
                'label' => 'Christelle Entraigues',
                'age' => '42',
                'description' => 'loremipssumdolorsitamet',
                'position' => '4'],

            self::FABRICE->value => [
                'label' => 'Fabrice Serdot',
                'age' => '42',
                'description' => 'loremipssumdolorsitamet',
                'position' => '5'],

            self::ELISABETH->value => [
                'label' => 'Elisabeth Pillier',
                'age' => '42',
                'description' => 'loremipssumdolorsitamet',
                'position' => '6'],

            self::ARNAULT->value => [
                'label' => 'Arnault Amoros',
                'age' => '42',
                'description' => 'loremipssumdolorsitamet',
                'position' => '7'],

            self::HELENE->value => [
                'label' => 'Hélène Blanquart',
                'age' => '42',
                'description' => 'loremipssumdolorsitamet',
                'position' => '8'],

            self::FRANCOIS->value => [
                'label' => 'François Bel',
                'age' => '42',
                'description' => 'loremipssumdolorsitamet',
                'position' => '9'],

            self::LAURENCE->value => [
                'label' => 'Laurence Vincent-Hucault',
                'age' => '42',
                'description' => 'Laurence loremipssumdolorsitamet',
                'position' => '10'],

            self::FABIO->value => [
                'label' => 'Fabio Hadjimanuel',
                'age' => '42',
                'description' => 'loremipssumdolorsitamet',
                'position' => '11'],

            self::ANNE_LAURENCE->value => [
                'label' => 'Anne-Laurence Berruet',
                'age' => '42',
                'description' => 'Anne-loremipssumdolorsitamet',
                'position' => '12'],

            self::NOEL->value => [
                'label' => 'Noël Proust',
                'age' => '42',
                'description' => 'loremipssumdolorsitamet',
                'position' => '13'],

            self::LOUISE->value => [
                'label' => 'Louise Wallart',
                'age' => '42',
                'description' => 'loremipssumdolorsitamet',
                'position' => '14'],

            self::PASCAL->value => [
                'label' => 'Pascal Jaqcues',
                'age' => '42',
                'description' => 'loremipssumdolorsitamet',
                'position' => '15'],

            self::JULIE->value => [
                'label' => 'Julie Mathé',
                'age' => '42',
                'description' => 'loremipssumdolorsitamet',
                'position' => '16'],

            self::BAPTISTE->value => [
                'label' => 'Baptiste Boutier',
                'age' => '42',
                'description' => 'loremipssumdolorsitamet',
                'position' => '17'],
    ];

    public static function tryFromFolder(?string $folder): ?self
    {
        if ($folder === null) {
            return null;
        }

        // Si le dossier correspond exactement à une valeur de l’Enum
        return self::tryFrom($folder);
    }

    public function label(): string
    {
        return self::LABELS[$this->value]['label'] ?? $this->value;
    }

    public function age(): string
    {
        return self::LABELS[$this->value]['age'] ?? $this->value;
    }

    public function description(): string
    {
        return self::LABELS[$this->value]['description'] ?? $this->value;
    }

    public function position(): string
    {
        return self::LABELS[$this->value]['position'] ?? $this->value;
    }

    public static function labelForFolder(?string $folder): ?string
    {
        $member = self::tryFromFolder($folder);

        return $member?->label();
    }

    public static function descriptionforPerson(?string $folder): ?string
    {
        $member = self::tryFromFolder($folder);

        return $member?->description();
    }

    public static function ageforPerson(?string $folder): ?string
    {
        $member = self::tryFromFolder($folder);

        return $member?->age();
    }

    public static function positionforPerson(?string $folder): ?string
    {
        $member = self::tryFromFolder($folder);

        return $member?->position();
    }

}
