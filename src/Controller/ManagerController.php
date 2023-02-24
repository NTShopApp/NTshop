<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\Supplier;
use App\Entity\User;
use App\Form\brandType;
use App\Form\EditBrand;
use App\Repository\OrderRepository;
use App\Repository\ProductRepository;
use App\Repository\SupplierRepository;
use App\Repository\UserRepository;
use Doctrine\DBAL\Exception\ForeignKeyConstraintViolationException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
date_default_timezone_set('Asia/Ho_Chi_Minh');

class ManagerController extends AbstractController
{
    /**
     * @Route("/manager/product", name="managerProduct")
     */
    public function managerPro(ProductRepository $repo,SupplierRepository $brand): Response
    {
        $pro = $repo->findAll();
        $BR = $brand->findAll();
        return $this->render('manager/product.html.twig', [
            'pro'=>$pro, 'brand' => $BR
        ]);
    }

    /**
     * @Route("/manager/Account", name="managerAccount")
     */
    public function managerAcc(UserRepository $repo,SupplierRepository $brand): Response
    {
        $acc = $repo->findAll();
        $BR = $brand->findAll();
        return $this->render('manager/account.html.twig', [
            'acc'=>$acc, 'brand' => $BR
        ]);
    }
     /**
     * @Route("/manager/Brand", name="managerBrand")
     */
    public function managerbrand(SupplierRepository $brand): Response
    {
        ;
        $BR = $brand->findAll();
        return $this->render('manager/brand.html.twig', [
             'brand' => $BR
        ]);
    }

    /**
     * @Route("manager/brand/delete/{id}",name="delete_brand", requirements={"id"="\d+"})
     */
    
     public function deleteAction(SupplierRepository $repo, Supplier $b): Response
     {
        try {
            $repo->remove($b,true);
        } catch (ForeignKeyConstraintViolationException $th) {
            return $this->redirectToRoute('errForm', [], Response::HTTP_SEE_OTHER);
        }
         return $this->redirectToRoute('managerBrand', [], Response::HTTP_SEE_OTHER);
    }
    /**
     * @Route("manager/addbrand", name="addbrand")
     */
    public function addbrand(Request $req, SupplierRepository $repo, SupplierRepository $brand): Response
    {
        $BR = $brand->findAll();
         $s = new Supplier();
        $form = $this->createForm(brandType::class,$s);
        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){
            $repo->add($s,true);
            return $this->redirectToRoute('managerBrand', [], Response::HTTP_SEE_OTHER);

        }
        return $this->render('manager/addbrand.html.twig',[
            'form'=>$form->createView(), 'brand' => $BR
            ]);
    }
    /**
     * @Route("/errForm", name="errForm")
     */
    public function ERROR(SupplierRepository $brand): Response
    {
        $BR = $brand->findAll();
        return $this->render('manager/Error.html.twig', [
            'brand' => $BR
        ]);
    }
      /**
     * @Route("/manager/bill", name="managerBill")
     */
    public function managerbill(SupplierRepository $brand, OrderRepository $repo): Response
    {
        $oid = $repo->managerbill();
        $BR = $brand->findAll();
        return $this->render('manager/Bill.html.twig', [
             'brand' => $BR,'oid'=>$oid
        ]);
    }
    /**
     * @Route("/view/{id}", name="viewbill")
     */
    public function view(SupplierRepository $brand, OrderRepository $order, ProductRepository $pro,
    UserRepository $user, Order $o): Response
    {
       
        $BR = $brand->findAll();
        $total = $order->totaldetail($o);
        $viewdate = $order->viewdate($o);
        $billproduct = $order->billproduct($o);
        $billdetail = $order->billdetail($o);
        return $this->render('manager/viewbill.html.twig', ['brand' => $BR, 'billdetail'=>$billdetail,'billproduct'=>$billproduct,'date'=>$viewdate,
        'total'=>$total, 'oid'=>$o
    ]);
    }
    /**
     * @Route("/editbrand/{id}", name="editbrand")
     */
    public function editbrand(Request $req, SupplierRepository $repo, Supplier $s): Response
    {
        $BR = $repo->findAll();
        $form = $this->createForm(EditBrand::class,$s);
        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){
            $repo->add($s,true);
            return $this->redirectToRoute('managerBrand', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('manager/editbrand.html.twig',[
            'form'=>$form->createView(),'brand' => $BR
            ]);
    }
}
