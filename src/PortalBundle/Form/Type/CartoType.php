<?php

namespace PortalBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FormType;

class CartoType extends AbstractType
{
    function __construct() {
    }

    public function getParent()
    {
        return FormType::class;
    }
}
