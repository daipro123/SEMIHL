<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface; // Add this line


class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CategoryRepository $categoryRepository, UrlGeneratorInterface $urlGenerator): Response
    {
        $categories = $categoryRepository->findBy([], [], 6);

        return $this->render('home/index.html.twig', [
            'categories' => $categories,
            'urlGenerator' => $urlGenerator,
        ]);
    }
    #[Route('allproducts', name: 'app_all_products')]
public function showAllProducts(CategoryRepository $categoryRepository, UrlGeneratorInterface $urlGenerator): Response
{
    $categories = $categoryRepository->findAll(); // Fetch all categories

    return $this->render('home/show_all_products.html.twig', [
        'categories' => $categories,
        'urlGenerator' => $urlGenerator,
    ]);
}

}
