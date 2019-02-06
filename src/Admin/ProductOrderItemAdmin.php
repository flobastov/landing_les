<?php
/**
 * Created by IntelliJ IDEA.
 * User: kirillrossokhin
 * Date: 12.09.2018
 * Time: 11:48
 */

namespace App\Admin;


use App\Entity\Product;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class ProductOrderItemAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {

        $form
            ->add('product', ModelType::class, [
                'class' => Product::class,
                'property' => 'name',
                'btn_add' => false,
                'label' => 'Наименование товара',
            ])
            ->add('quantity', NumberType::class, [
                'label' => 'Количество',
            ]);
    }
}
