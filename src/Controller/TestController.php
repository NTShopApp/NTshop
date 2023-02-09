<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="app_test")
     */
    public function index(ProductRepository $repo): Response
    {
        $pro = $repo->findAll();
        return $this->render('test/index.html.twig', [
            'pro' => $pro,
        ]);
    }
    /**
     * @Route("/login", name="loginWeb")
     */
    public function Login(): Response
    {
        return $this->render('test/login.html.twig');
    }
    /**
     * @Route("/register", name="register")
     */
    public function Register(): Response
    {
        return $this->render('test/register.html.twig');
    }/**
     * @Route("/blogs", name="Blog")
     */
    public function Blog(): Response
    {
        return $this->render('test/blog.html.twig', []);
    }
    /**
     * @Route("/blogdetail", name="blogdetails")
     */
    public function blogdetail(): Response
    {
        return $this->render('test/blogdetail.html.twig', []);
    }
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('test/contact.html.twig', []);
    }
    /**
     * @Route("/policy", name="policy")
     */
    public function policy(): Response
    {
        return $this->render('test/policy.html.twig', []);
    }
    
    
    /**
     * @Route("/term", name="term")
     */
    public function term(): Response
    {
        return $this->render('test/terms.html.twig', []);
    }
     /**
     * @Route("/manager", name="manager")
     */
    public function manager(): Response
    {
        return $this->render('test/manager.html.twig', []);
    }
}
