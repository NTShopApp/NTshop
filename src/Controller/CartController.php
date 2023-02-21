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
     * @Route("/addone/{id}", name="addone")
     */
    public function addOneAction(CartRepository $repo, ValidatorInterface $valid, Product $pro, SupplierRepository $brand, Request $req ): Response
    {   
        // $user = $this->get('security.context')->getToken()->getUser();
        // $userId = $user->getId();
        
        $quantity = $req->query->get('quantity');
        $BR = $brand->findAll();
        $cart = new Cart();
        $id = $this->getUser();
        $cart->setProId($pro);
        $cart->setquantity($quantity);
        // $cart->setbirthday(new \DateTime());
        $cart->setusercart($id);
        $error = $valid->validate($cart);
        if(count($error)>0){
            $err_str = (string)$error;
            return new Response($err_str,400);
        }
        $repo->add($cart,true);
        // return $this->json($cart);
        return $this->redirectToRoute('app_test', [
            'brand' => $BR, 'pro'=>$cart
        ], Response::HTTP_SEE_OTHER);
       
    }
    /**
     * @Route("/cart", name="cart")
     */
    public function cartt(SupplierRepository $brand ,CartRepository $repo): Response
    {
        $id = $this->getUser();
        $cart = $repo->cart($id);
        $BR = $brand->findAll();
        return $this->render('cart/index.html.twig', [
            'pro'=>$cart, 'brand' => $BR
        ]);
    }
}

