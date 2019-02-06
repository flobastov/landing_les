<?php
/**
 * Created by IntelliJ IDEA.
 * User: kirillrossokhin
 * Date: 06.09.2018
 * Time: 9:20
 */

namespace App\Admin;


use App\Entity\ProductCategory;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductCategoryAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', TextType::class, [
                'label' => 'Название'
            ])
            ->add('parent', ModelType::class, [
                'label' => 'Родительская категория',
                'class' => ProductCategory::class,
                'property' => 'name',
                'required' => false,
                'btn_add' => false,
            ])
            ->add('slug', TextType::class, [
                'label' => 'Символическая ссылка (формируется автоматически)',
                'required' => false,
                'disabled' => true,
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
            ->add('slug', null, [
                'label' => 'Символическая ссылка'
            ])
            ->addIdentifier('name', null, [
                'label' => 'Название'
            ]);
    }

    public function toString($object)
    {
        return $object instanceof ProductCategory
            ? $object->getName()
            : 'Категория'; // shown in the breadcrumb on the create view
    }
}
