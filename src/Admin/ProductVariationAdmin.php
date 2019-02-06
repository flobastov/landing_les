<?php
/**
 * Created by IntelliJ IDEA.
 * User: kirillrossokhin
 * Date: 14.09.2018
 * Time: 8:43
 */

namespace App\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductVariationAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('param', TextType::class, [
                'label' => 'Параметр'
            ])
            ->add('value', TextType::class, [
                'label' => 'Значение'
            ])
            ->add('price', NumberType::class, [
                'label' => 'Цена'
            ])
            ->add('priceSale', NumberType::class, [
                'label' => 'Цена со скидкой'
            ])
        ;
    }
}
