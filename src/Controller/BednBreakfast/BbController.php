<?php

namespace App\Controller\BednBreakfast;

use App\Repository\HolidayHomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BbController extends AbstractController
{
    private HolidayHomeRepository $repo;

    public function __construct (HolidayHomeRepository $repo)
    {
        $this->repo = $repo;
    }
    /**
     * @Route("/BednBreakfast", name="bb.index")
     */
    public function index(): Response
    {
        $BB = $this->repo->findAll();
        return $this->render('Bb/index.html.twig', [
            'BB' => $BB
        ]);
    }
}
