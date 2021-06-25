<?php

namespace App\Controller\BednBreakfast;

use App\Entity\BBSearch;
use App\Entity\HolidayHome;
use App\Form\BBSearchType;
use App\Repository\HolidayHomeRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BbController extends AbstractController
{
    private HolidayHomeRepository $repo;

    public function __construct(HolidayHomeRepository $repo)
    {
        $this->repo = $repo;
    }
    /**
     * @Route("/Homepage", name="homepage")
     * 
     */
    public function Home(PaginatorInterface $paginator, Request $request): Response
    {


        $BBs = $paginator->paginate(
            $this->repo->findLatestBB(),
            $request->query->getInt('page', 1),
            9
        );

        return $this->render('Homepage/index.html.twig', [
            'current_page' => 'BBs',
            'BBs' => $BBs

        ]);
    }

    /**
     * @Route("/BednBreakfast", name="bb.index")
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $search = new BBSearch();
        $form = $this->createForm(BBSearchType::class, $search);
        $form->handleRequest($request);


        $BBs = $paginator->paginate(
            $this->repo->findAllVisibleQuery($search),
            $request->query->getInt('page', 1),
            9
        );


        return $this->render('Bb/index.html.twig', [
            'current_page' => 'BBs',
            'BBs' => $BBs,
            'form' => $form->createView()
        ]);
    }

    /**
     * @route( "/HolidayHome/{id}", name= "Bb.show")
     */
    public function show(int $id)
    {
        $BB = $this->repo->find($id);
        return $this->render('/Bb/show.html.twig', [
            'BB' => $BB
        ]);
    }
}
