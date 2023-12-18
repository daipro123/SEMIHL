<?php

// src/Controller/ProductDetailController.php

namespace App\Controller;
// src/Controller/ProductDetailController.php

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface; // Add this line

class ProductDetailController extends AbstractController
{
    #[Route('productdetail/{id}', name: 'app_productdetail')]
    public function index(ProductRepository $productRepository, UrlGeneratorInterface $urlGenerator , CategoryRepository $categoryRepository, $id): Response
    {
        $categories = $categoryRepository->findBy([], [], 8);
        $product = $productRepository->find($id);

        // Fetch the latest products
        $latestProducts = $productRepository->findLatestProducts(4);

        return $this->render('productdetail/index.html.twig', [
            'product' => $product,
            'categories' => $categories,
            'latestProducts' => $latestProducts,
            'urlGenerator' => $urlGenerator,
        ]);
    }
}

