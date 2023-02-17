<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Repository\SupplierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Role\Role;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="app_test")
     */
    public function index(ProductRepository $repo, SupplierRepository $brand): Response
    {
        $BR = $brand->findAll();
        $pro = $repo->findAll();
        return $this->render('test/index.html.twig', [
            'pro' => $pro, 'brand' => $BR
        ]);
    }
    // /**
    //  * @Route("/login", name="loginWeb")
    //  */
    // public function Login(): Response
    // {
    //     return $this->render('test/login.html.twig');
    // }
    // /**
    //  * @Route("/register", name="register")
    //  */
    // public function Register(): Response
    // {
    //     return $this->render('test/register.html.twig');
    // }
    /**
     * @Route("/blogs", name="Blog")
     */
    public function Blog(SupplierRepository $brand): Response
    {
        $BR = $brand->findAll();
        return $this->render('test/blog.html.twig', [ 'brand' => $BR]);
    }
    /**
     * @Route("/blogdetail", name="blogdetails")
     */
    public function blogdetail(SupplierRepository $brand): Response
    {
        $BR = $brand->findAll();
        return $this->render('test/blogdetail.html.twig', ['brand' => $BR]);
    }
   
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(SupplierRepository $brand): Response
    {
        $BR = $brand->findAll();
        return $this->render('test/contact.html.twig', ['brand' => $BR]);
    }
    /**
     * @Route("/policy", name="policy")
     */
    public function policy(SupplierRepository $brand): Response
    {
        $BR = $brand->findAll();
        return $this->render('test/policy.html.twig', ['brand' => $BR]);
    }
    
    
    /**
     * @Route("/term", name="term")
     */
    public function term(SupplierRepository $brand): Response
    {
        $BR = $brand->findAll();
        return $this->render('test/terms.html.twig', ['brand' => $BR]);
    }
     /**
     * @Route("/brand", name="brand")
     */
    public function showBrand(SupplierRepository $repo, $brand): Response
    {
        $BR = $brand->findAll();
        $brand = $repo->findAll();
        return $this->render('base.html.twig', [
            'brand'=> $brand,'brand' => $BR
        ]);
    }
    
}
