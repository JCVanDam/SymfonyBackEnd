<?php

namespace OrnithoPinniBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FormType;

class CustomintegerType extends AbstractType
{
    function __construct() {
    }

    public function getParent()
    {
        return FormType::class;
    }
}
