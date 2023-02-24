<?php

namespace App\Controller;


use App\Entity\Product;
use App\Entity\User;
use App\Form\AddProType;
use App\Form\EditProType;
use App\Repository\ProductRepository;
use App\Repository\ProsupRepository;
use App\Repository\SupplierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
date_default_timezone_set('Asia/Ho_Chi_Minh');
class ProductController extends AbstractController
{
    private ProductRepository $repo;
    public function __construct(ProductRepository $repo){
        $this->repo = $repo;
    }
    /**
     * @Route("/product", name="product")
     */
    public function product(ProductRepository $repo, SupplierRepository $brand): Response
    {
        $pro =$repo->findAll();
        $BR = $brand->findAll();
        return $this->render('product/index.html.twig', [
            'pro'=>$pro,'brand' => $BR
        ]);
    }

    
    
    /**
     * @Route("/product/{id}", name="productdetail")
     */
    public function productdetail(Product $pro, SupplierRepository $brand): Response
    {
        $BR = $brand->findAll();
        return $this->render('product/productdetail.html.twig', [
           
                'pro'=>$pro, 'brand' => $BR
            
        ]);
    }

     /**
     * @Route("/addproduct", name="addproduct")
     */
    public function addproduct( SluggerInterface $slugger, Request $req, SupplierRepository $brand): Response
    {
        // $p = new Product();
        // $form = $this->createForm(AddProType::class,$p);
        // $form->handleRequest($req);
        // if($form->isSubmitted()&&$form->isValid()){
        //     $repo->add($p,true);
        //     return new Response("success");
        // }
        // return $this->render('product/addproduct.html.twig',[
        //     'form'=>$form->createView()
        //     ]);
        $p = new Product();
        $BR = $brand->findAll();
        $form = $this->createForm(AddProType::class, $p);

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
           
            $imgFile = $form->get('file')->getData();
            if ($imgFile) {
                $newFilename = $this->uploadImage($imgFile,$slugger);
                $p->setImage($newFilename);
            }
            $this->repo->add($p,true);
            return $this->redirectToRoute('managerProduct', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("product/addproduct.html.twig",[
            'form' => $form->createView(),'brand' => $BR
        ]);

    }
    public function uploadImage($imgFile, SluggerInterface $slugger): ?string{
        $originalFilename = pathinfo($imgFile->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $slugger->slug($originalFilename);
        $newFilename = $safeFilename.'-'.uniqid().'.'.$imgFile->guessExtension();
        try {
            $imgFile->move(
                $this->getParameter('image_dir'),
                $newFilename
            );
        } catch (FileException $e) {
            echo $e;
        }
        return $newFilename;
    }
         /**
     * @Route("/edit/{id}", name="edit",requirements={"id"="\d+"})
     */
    public function editAction(Request $req, Product $p,
    SluggerInterface $slugger, SupplierRepository $brand): Response
    {
        $BR = $brand->findAll();
        $form = $this->createForm(EditProType::class, $p);   

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){

           
            $imgFile = $form->get('file')->getData();
            if ($imgFile) {
                $newFilename = $this->uploadImage($imgFile,$slugger);
                $p->setImage($newFilename);
            }
            $this->repo->add($p,true);
            return $this->redirectToRoute('managerProduct', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("product/editproduct.html.twig",[
            'form' => $form->createView(), 'brand' => $BR
        ]);
    }

  


    
    //  /**
    //  * @Route("/editpro/{id}", name="edit")
    //  */
    // public function editPro(ProductRepository $repo, Request $req,Product $p): Response
    // {
       
    //     $form = $this->createForm(EditProType::class,$p);
    //     $form->handleRequest($req);
    //     if($form->isSubmitted()&&$form->isValid()){
    //         $repo->add($p,true);
    //         return new Response("success");
    //     }
    //     return $this->render('product/editproduct.html.twig',[
    //         'form'=>$form->createView()
    //         ]);
    // }
   
    
   
    
    /**
     * @Route("/delete/product/{id}",name="product_delete",requirements={"id"="\d+"})
     */
    
     public function deleteAction(Request $request, Product $p): Response
     {
         $this->repo->remove($p,true);
         return $this->redirectToRoute('managerProduct', [], Response::HTTP_SEE_OTHER);
     }

     /**
     * @Route("/search", name="searchpro", methods="GET")
     */
    public function searchAction(Request $req,SupplierRepository $brand,ProductRepository $repo): Response
    {
        $BR = $brand->findAll();
        $sName = $req->query->get("search");
        $product = $repo->findProductBySearch($sName);
        return $this->render('product/search.html.twig', 
        ['product'=>$product,'brand'=> $BR]);
        // return $this->json($sName);
    }
    //   /**
    //  * @Route("/delete/account/{id}",name="account_delete",requirements={"id"="\d+"})
    //  */
    
    //  public function deleteAccount(Request $request, User $u): Response
    //  {
    //      $this->repo->remove($u,true);
    //      return $this->redirectToRoute('managerAccount', [], Response::HTTP_SEE_OTHER);
    //  }
     
 
}
