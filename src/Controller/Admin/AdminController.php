<?php

namespace  App\Controller\Admin;
use App\Entity\HolidayHome;
use App\Form\BBType;
use App\Repository\HolidayHomeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    private HolidayHomeRepository $HolidayHomeRepository;
    private EntityManagerInterface $em;
    public function __construct(HolidayHomeRepository $HolidayHomeRepository, EntityManagerInterface $em)
    {
        $this->HolidayHomeRepository = $HolidayHomeRepository;
        $this->em =$em;
    }

    /**
     * @route("/admin", name ="admin.index")
     */

    public function index(): Response
    {
        $BBs = $this->HolidayHomeRepository->findAll();
        return $this->render('/admin/index.html.twig', [

            "BBs" => $BBs

        ]);
    }
/**
 * @route("/admin/{id}",name="admin.BB.edit")
 * @param BB $BB
 * @param Request $request 
 * return\Symfony\Component\HttpFoundation\Response;
 */
    public function edit( Request $request)
    {
       $BB= new holidayHome();
        $form = $this->createForm(BBType::class,$BB);
        $form->handleRequest($request);
        

        if ($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
        }
       return $this ->render ( 'admin/edit.html.twig', [
           "formBB" => $form ->createView()
       ]);
    
    
    }
 

 /**
     * @route("/admin/new", name="admin.new")
     */
    public function new(Request $request)

    {
        $BB = new HolidayHome();
        $form = $this->createForm(BBType::class,$BB);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) 
        {
           
            $this->em->persist($BB);
            $this->em->flush();
            $this->addFlash("success","Your file is validated");
            return $this->redirectToRoute('admin.index');
        }
        return $this->render('/admin/new.html.twig', [
            "formBB" => $form->createView()
        ]);
    }
}