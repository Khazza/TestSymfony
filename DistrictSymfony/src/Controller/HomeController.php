<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategorieRepository;
use App\Repository\PlatRepository;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(CategorieRepository $categorieRepository, PlatRepository $platRepository): Response
    {
        $categories = $categorieRepository->getRandomCategories(6);
        $plats = $platRepository->getRandomPlats(3);
    
        return $this->render('home/index.html.twig', [
            'categories' => $categories,
            'plats' => $plats,
        ]);
    }
}

