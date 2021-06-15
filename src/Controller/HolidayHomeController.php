<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HolidayHomeController extends AbstractController
{
    /**
     * @Route("/holiday/home", name="holiday_home")
     */
    public function index(): Response
    {
        return $this->render('holiday_home/index.html.twig', [
            'controller_name' => 'HolidayHomeController',
        ]);
    }
}
