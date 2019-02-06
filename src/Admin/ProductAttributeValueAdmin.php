<?php
/**
 * Created by IntelliJ IDEA.
 * User: kirillrossokhin
 * Date: 06.09.2018
 * Time: 9:20
 */

namespace App\Admin;


use App\Entity\ProductAttributeValue;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductAttributeValueAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('attribute', ModelType::class, [
                'label' => 'Характеристика',
                'property' => 'name',
//                'required' => false,
            ])
            ->add('value', TextType::class, [
                'label' => 'Значение'
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('value');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('value');
    }

    public function toString($object)
    {
        return $object instanceof ProductAttributeValue
            ? $object->getAttribute()->getName()
            : 'Характеристика'; // shown in the breadcrumb on the create view
    }
}
