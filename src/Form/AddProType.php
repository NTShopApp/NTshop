<?php

namespace App\Form;

use App\Entity\Supplier;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AddProType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
        // ->add('id',TextType::class)
        ->add('idpro',TextType::class)
        ->add('namepro',TextType::class)
        ->add('price',TextType::class)
        ->add('infopro',TextType::class)
        ->add('image',HiddenType::class,[
            'required'=>false
        ])
        ->add('file',FileType::class,[
            'label'=>'Product Img',
            'required'=> false,
            'mapped'=>false
        ])
        ->add('supplier',EntityType::class,[
            'class'=>Supplier::class,
            'choice_label'=>'namesup'
        ]
        )
        ->add('save',SubmitType::class,[
            'label'=>"Add"
        ]);
    }
}
?>