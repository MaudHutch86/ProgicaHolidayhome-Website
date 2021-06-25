<?php

namespace App\Controller;

use App\Entity\HolidayHome;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HolidayHomeController extends AbstractController
{
    /**
     * @Route("/homepage", name="homepage")
     */
    public function index(): Response

    {
       
    
        return $this->render('holiday_home/index.html.twig', [
            'controller_name' => 'HolidayHomeController',
        ]);
    }
}
