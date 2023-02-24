<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface as FormFormBuilderInterface;

class EditBrand extends AbstractType{
    public function buildForm(FormFormBuilderInterface $builder, array $options){
        $builder
        ->add('namesup',TypeTextType::class)
        ->add('save',SubmitType::class,[
            'label'=>"Add"
        ]);
    }
    }
?>