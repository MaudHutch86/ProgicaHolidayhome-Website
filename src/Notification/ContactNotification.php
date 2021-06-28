<?php

namespace App\Notification;

use App\Entity\Contact;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;


class ContactNotification{

    private $mailer;

public function __construct(MailerInterface $mailer)
{
    $this->mailer = $mailer;
}


    public function notify(Contact $contact)
{
    $email= (new TemplatedEmail())
    ->from('contact@progica.fr')
    ->to($contact->getEmail())
    ->subject("Demande de contact")
    ->htmlTemplate('Notification/Contact.html.twig', ['contact'=>$contact]);
    
    $this->mailer->send($email);
}

}