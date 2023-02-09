<?php

namespace App\Controller;

use App\Entity\Customer;
use Symfony\Component\HttpFoundation\Request;
use App\Form\SignupType;
use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    /**
     * @Route("/signup", name="app_sign_up")
     */
    public function signup(CustomerRepository $repo,Request $req): Response
    {
        $c = new Customer();
        
        $form = $this->createForm(SignupType::class,$c);
        $form->handleRequest($req);

        if ($form->isSubmitted()&&$form->isValid()){
            $repo->add($c,true);
            return new Response ("Signup successful");

        }
        return $this->render('signup/index.html.twig',[
        'form'=>$form->createView()
        ]);

    }
}
