<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class SignupType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder 
        ->add('cusname',TextType::class)
        ->add('password',PasswordType::class)
        ->add('conpass',PasswordType::class)
        ->add('phone',TextType::class)
        ->add('email',TextType::class)
        ->add('address',TextType::class)
        ->add('save',SubmitType::class,
    [
        'label'=>"Signup"
    ]);
    }
}
?>