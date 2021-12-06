<?php

namespace App\Controller;

use App\Entity\Link;
use App\Repository\LinkRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(LinkRepository $repo, ManagerRegistry $doctrine): Response
    {
        //? Si vous êtes sur PHP<8, vos routes s'écriront de cette façon (attention, des double-quotes et un = pour les options)
        /**
         * @Route("/",name="app_home")
         */
        $links = $repo->findAll();

        // $entityManager = $doctrine->getManager();

        // $link = new Link();
        // $link->setName('Zelda');

        // $entityManager->persist($link);
        // $entityManager->flush();

        return $this->render('home/index.html.twig', [
            'links' => $links,
        ]);
    }
}