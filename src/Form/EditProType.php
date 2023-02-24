<?php
namespace App\Form;

use App\Entity\Supplier;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EditProType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
        // ->add('id',TextType::class)
        ->add('idpro',TextType::class)
        ->add('namepro',TextType::class,[
            'label'=>'Name'
        ])
        ->add('price',TextType::class,[
            'label'=>'Price'
        ])
        ->add('infopro',TextType::class,[
            'label'=>'Products Information'
        ])
        
        
        ->add('file',FileType::class,[
            'label'=>'Product Img',
            'required'=> false,
            'mapped'=>false
        ])
        ->add('image',HiddenType::class,[
            'required'=>false
        ])
        ->add('supplier',EntityType::class,[
            'class'=>Supplier::class,
            'choice_label'=>'namesup'
        ])
        ->add('save',SubmitType::class,[
            'label'=>"Add"
        ]);
    }
}
?>