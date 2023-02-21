<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class brandType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
        // ->add('id',TextType::class)
        ->add('namesup',TextType::class)
        ->add('save',SubmitType::class,[
            'label'=>"Add"
        ]);
    }
}
?>