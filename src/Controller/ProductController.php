<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\AddProType;
use App\Form\EditProType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function product(ProductRepository $repo): Response
    {
        $pro =$repo->findAll();
        return $this->render('product/index.html.twig', [
            'pro'=>$pro
        ]);
    }
    
    /**
     * @Route("/product/{id}", name="productdetail")
     */
    public function productdetail(Product $pro): Response
    {
        return $this->render('product/productdetail.html.twig', [
           
                'pro'=>$pro
            
        ]);
    }

     /**
     * @Route("/adproduct", name="addproduct")
     */
    public function addproduct(ProductRepository $repo, Request $req): Response
    {
        $p = new Product();
        $form = $this->createForm(AddProType::class,$p);
        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){
            $repo->add($p,true);
            return new Response("success");
        }
        return $this->render('product/addproduct.html.twig',[
            'form'=>$form->createView()
            ]);
    }
    
     /**
     * @Route("/editpro/{id}", name="edit")
     */
    public function editPro(ProductRepository $repo, Request $req,Product $p): Response
    {
       
        $form = $this->createForm(EditProType::class,$p);
        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){
            $repo->add($p,true);
            return new Response("success");
        }
        return $this->render('product/addproduct.html.twig',[
            'form'=>$form->createView()
            ]);
    }
   
    
    
}
