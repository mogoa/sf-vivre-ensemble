<?php

namespace App\Controller;

use App\DTO\ContactDTO;
use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact', options: ['sitemap' => true])]
    public function index(Request $request, MailerInterface $mailer, SessionInterface $session): Response
    {
        $contactDTO = new ContactDTO();
        $form = $this->createForm(ContactType::class, $contactDTO);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            // Protection 1 : Honeypot (champ caché qui doit rester vide)
            if (!empty($data->website)) {
                return $this->redirectToRoute('contact');
            }

            // Protection 2 : Time-based (le formulaire doit prendre au moins 3 secondes)
            $formLoadTime = $session->get('contact_form_load_time');
            if ($formLoadTime && (time() - $formLoadTime) < 3) {
                $this->addFlash('error', 'Veuillez prendre le temps de remplir correctement le formulaire.');
                return $this->redirectToRoute('contact');
            }

            // Protection 3 : Rate limiting (max 3 messages par heure par IP)
            $ipKey = 'contact_attempts_' . $request->getClientIp();
            $attempts = $session->get($ipKey, 0);
            if ($attempts >= 3) {
                $this->addFlash('error', 'Vous avez atteint la limite d\'envoi. Veuillez réessayer plus tard.');
                return $this->redirectToRoute('contact');
            }

            // Création de l'email
            $email = (new TemplatedEmail())
                ->from('noreply@vivreensemble-larocheclermault.fr')
                //->to()
                ->subject('Nouveau message de contact')
                ->htmlTemplate('emails/contact.html.twig')
                ->context([
                    'name' => $data->name,
                    'visitor_email' => $data->email,
                    'visitor_message' => $data->message,
                    'recontact' => $data->recontact,
                ]);

            try {
                $mailer->send($email);

                // Incrémenter le compteur de tentatives
                $session->set($ipKey, $attempts + 1);

                $this->addFlash('success', 'Merci pour votre message ! Nous vous répondrons dans les plus brefs délais.');

                return $this->redirectToRoute('contact');

            } catch (\Exception $e) {
                $this->addFlash('error', 'Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer.');
                dd($e->getMessage());
                return $this->redirectToRoute('contact');
            }
        }

        // Enregistrer le timestamp de chargement du formulaire
        $session->set('contact_form_load_time', time());

        return $this->render('contact/index.html.twig', [
            'form' => $form,
            'page_title' => 'Contactez-nous',
        ]);
    }
}
