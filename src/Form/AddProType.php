<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
        ->add('image',FileType::class)
        ->add('save',SubmitType::class,[
            'label'=>"Add"
        ]);
    }
}
?>