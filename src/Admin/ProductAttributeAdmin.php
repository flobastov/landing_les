<?php
/**
 * Created by IntelliJ IDEA.
 * User: kirillrossokhin
 * Date: 06.09.2018
 * Time: 9:20
 */

namespace App\Admin;


use App\Entity\ProductAttribute;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductAttributeAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', TextType::class, [
                'label' => 'Название'
            ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, [
                'label' => 'Название'
            ]);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('name', null, [
                'label' => 'Название'
            ]);
    }

    public function toString($object)
    {
        return $object instanceof ProductAttribute
            ? $object->getName()
            : 'Категория'; // shown in the breadcrumb on the create view
    }
}
