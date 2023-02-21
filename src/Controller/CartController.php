<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Entity\Product;
use App\Entity\User;
use App\Repository\CartRepository;
use App\Repository\SupplierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

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
      /**
     * @Route("/addone/{id}", name="addone")
     */
    public function addOneAction(CartRepository $repo, ValidatorInterface $valid, int $id, SupplierRepository $brand, Request $req ): Response
    {   
        $quantity = $req->query->get('quantity');
        $BR = $brand->findAll();
        $cart = new Cart();
        $cart->setProId($id);
        $cart->setquantity($quantity);
        // $cart->setbirthday(new \DateTime());
        // $cart->setProid();
        $error = $valid->validate($cart);
        if(count($error)>0){
            $err_str = (string)$error;
            return new Response($err_str,400);
        }
        $repo->add($cart,true);
        // return $this->json($cart);
        return $this->redirectToRoute('cart', [
            'brand' => $BR
        ], Response::HTTP_SEE_OTHER);
       
    }
    /**
     * @Route("/cart", name="cart")
     */
    public function cartt(SupplierRepository $brand ,CartRepository $repo): Response
    {
        $cart = $repo->findAll();
        $BR = $brand->findAll();
        return $this->render('cart/index.html.twig', [
            'pro'=>$cart, 'brand' => $BR
        ]);
    }
}

