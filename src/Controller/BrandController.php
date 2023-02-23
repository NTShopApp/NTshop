<?php

namespace App\Controller;

use App\Entity\Prosup;
use App\Entity\Supplier;
use App\Repository\ProsupRepository;
use App\Repository\SupplierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
date_default_timezone_set('Asia/Ho_Chi_Minh');

class BrandController extends AbstractController
{
    
     /**
     * @Route("/brand/{id}", name="branddetail")
     */
    public function showBranddetail(SupplierRepository $repo,$id, Supplier $sup): Response
    {
        $pro = $repo->findbrand($id);
        $brand = $repo->findAll();

        // return $this->json($brand);
        return $this->render('brand/index.html.twig', [
            'pro'=> $pro,
            'brand'=>$brand
        ]);
    }
}
