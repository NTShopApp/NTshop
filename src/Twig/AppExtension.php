<?php
namespace App\Twig;


use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

//tao ham customer

class AppExtension extends AbstractExtension{
    public function getFunctions()
    {
        return [
            new TwigFunction('sum',[$this,'sum'])
        ];
    }
    public function sum(int $quantity,float $price){
        return $quantity*$price;
    }
};
?>