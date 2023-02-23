<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Entity\Order;
use App\Entity\Orderdetail;
use App\Entity\Product;
use App\Entity\User;
use App\Repository\CartRepository;
use App\Repository\OrderdetailRepository;
use App\Repository\OrderRepository;
use App\Repository\ProductRepository;
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
     public function checkout(SupplierRepository $brand, OrderRepository $order, CartRepository $repo, OrderdetailRepository $orderdetail, ProductRepository $pro): Response
     {
        //insert  to order
        $BR = $brand->findAll();
        $order1= new Order();
        $user = $this->getUser();
        $data[]=[
            'id'=>$user->getId()
        ];
        $id = $data[0]['id'];
        $order1->setuserorder($user);
        $product = $repo->cart($id);
        $totalAll = 0;
        foreach ($product as $p) {
            $totalAll += $p['total'];
        }
        $order1->setTotal($totalAll);
        $order1->setDate(new \Datetime());
        $order->add($order1, true);
        
        // insert to orderdetail
         
        $quantity = $repo->findcart($id);
        $orderdetail1 = new Orderdetail();
        
        foreach ($quantity as $q){
            for ($i = 1; $i < count($quantity); $i++){
                $orderdetail1->setQuantity($q['quantity']);
             }     
        }
        //  foreach ($quantity as $q){
        //     $orderdetail1->setpid($q['Pid']);
        // }
        // $oid = $order->orderdetail($id);
        // $oids = $oid[0]['id'];
        
        // $orderdetail1->setoid($oids);
        // $orderdetail->add($orderdetail1,true);
        return $this->json($orderdetail1);

        // return $this->render('cart/bill.html.twig', [
        //     'brand' => $BR
        // ]);
     }
}

