<?php

namespace  App\Controller\Admin;

use App\Repository\HolidayHomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

 class AdminController extends AbstractController {
     private HolidayHomeRepository $HolidayHomeRepository;
public function __construct(HolidayHomeRepository $HolidayHomeRepository)
{
    $this->HolidayHomeRepository=$HolidayHomeRepository;
}

    /**
     * @route("/homepage/admin", name="admin.index")
     */

    public function index(): Response
    {  
        $BBs = $this ->HolidayHomeRepository->findAll();
        return $this->render('/homepage/admin/index.html.twig', [
        
        "BBs"=>$BBs
            
        ]);
    }
}
 