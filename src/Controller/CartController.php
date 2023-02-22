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
        
        $user = $this->getUser();
        $data[]=[
            'id'=>$user->getId()
        ];
       $id = $data[0]['id'];
        //check pro id exist with $userId
        $carts = $repo->findBy([
               'proid'=>$pro->getId(),
            'usercart'=>$id
             ]);
            //  return $this->json(count($carts));
        //if null
        if (count($carts)==0){
             $cart = new Cart();
            $cart->setProId($pro);
            $cart->setquantity($quantity);
            // $cart->setbirthday(new \DateTime());
            $cart->setusercart($user);

        }
       
        else {
            
            $cart = $repo->find($carts[0]->getId()); // a Cart 
            $oldquantity = $cart->getQuantity();
            $newquantity = $oldquantity + $quantity;
            $cart->setquantity($newquantity);
        }
       

 
        $repo->add($cart,true);
        // return $this->json($cart);
        return $this->redirectToRoute('cart', [
            'brand' => $BR, 'pro'=>$cart
        ], Response::HTTP_SEE_OTHER);
       
    }
    /**
     * @Route("/cart", name="cart")
     */
    public function cartt(SupplierRepository $brand ,CartRepository $repo): Response
    {
        $user = $this->getUser();
        $data[]=[
            'id'=>$user->getId(),
            'name'=>$user->getName(),
            'email'=>$user->getUsername()
        ];
       $id = $data[0]['id'];
        // return $this->json($repo->cart($id));
        $cart = $repo->cart($id);
        $BR = $brand->findAll();

        // $cart = $reCart->findAll();
        $user = $this->getUser();
        $data[]=[
            'id'=>$user->getId()
        ];
        $uid = $data[0]['id']; 
        $product = $repo->cart($uid);
        $totalAll = 0;
        foreach ($product as $p) {
            $totalAll += $p['total'];
        }
       
        return $this->render('cart/index.html.twig', [
            'pro'=>$cart, 'brand' => $BR, 'total'=>$totalAll
        ]);
    }
     /**
     * @Route("/delete/cart/{id}",name="cart_delete",requirements={"id"="\d+"})
     */
    
     public function deletecart(CartRepository $repo, Cart $c): Response
     {
         $repo->remove($c,true);
         return $this->redirectToRoute('cart', [], Response::HTTP_SEE_OTHER);
     }

     /**
      * @Route("/checkout", name="checkout")
      */
     public function checkout(SupplierRepository $brand): Response
     {
        $BR = $brand->findAll();



        
        return $this->render('cart/bill.html.twig', [
            'brand' => $BR
        ]);
     }
}

