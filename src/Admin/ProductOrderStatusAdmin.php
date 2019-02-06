<?php
/**
 * Created by IntelliJ IDEA.
 * User: kirillrossokhin
 * Date: 12.09.2018
 * Time: 17:32
 */

namespace App\Admin;


use App\Entity\ProductOrderStatus;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductOrderStatusAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('name', TextType::class, [
                'label' => 'Название'
            ]);
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('id')
            ->addIdentifier('name', null, [
                'label' => 'Название'
            ]);
    }

    public function toString($object)
    {
        return $object instanceof ProductOrderStatus
            ? $object->getName()
            : 'Статус'; // shown in the breadcrumb on the create view
    }
}
