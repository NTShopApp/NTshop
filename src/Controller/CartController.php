<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart/{id}", name="app_cart")
     */
    public function cart(Product $pro): Response
    {
        return $this->render('cart/index.html.twig', [
           
            'pro'=>$pro
        
    ]);
    }
}
