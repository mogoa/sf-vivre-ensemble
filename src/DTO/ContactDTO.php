<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class ContactDTO
{
    #[Assert\NotBlank(message: 'Le nom est obligatoire')]
    #[Assert\Length(min: 2, max: 100)]
    public ?string $name = null;

    #[Assert\NotBlank(message: 'L\'email est obligatoire')]
    #[Assert\Email(message: 'L\'email n\'est pas valide')]
    public ?string $email = null;

    #[Assert\NotBlank(message: 'Le message est obligatoire')]
    #[Assert\Length(min: 10, max: 2000, minMessage: 'Le message doit contenir au moins 10 caractères')]
    public ?string $message = null;

    public bool $recontact = false;

    // Honeypot pour les bots (doit rester vide)
    public ?string $website = null;
}
