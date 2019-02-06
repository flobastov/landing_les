<?php
/**
 * Created by IntelliJ IDEA.
 * User: kirillrossokhin
 * Date: 06.09.2018
 * Time: 9:20
 */

namespace App\Admin;


use App\Entity\Product;
use App\Entity\ProductCategory;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\MediaBundle\Form\Type\MediaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper

            ->tab('Общее')
            ->with('Общее', [
                'class' => 'col-sm-12 col-md-8'
            ])
            ->add('name', TextType::class, [
                'label' => 'Название'
            ])
            ->add('body', CKEditorType::class, [
                'label' => 'Описание'
            ])
            ->add('media', MediaType::class, [
                'provider' => 'sonata.media.provider.image',
                'context' => 'products',
                'label' => 'Изображение'
            ])
            ->end()
            ->with('Мета', [
                'class' => 'col-sm-12 col-md-4'
            ])
            ->add('price', NumberType::class, [
                'label' => 'Цена',
                'required' => false,
            ])
            ->add('publish', CheckboxType::class, [
                'label' => 'Опубликовано',
                'required' => false
            ])
            ->add('productCategory', ModelType::class, [
                'class' => ProductCategory::class,
                'property' => 'name',
                'label' => 'Категория'
            ])
            ->end()
            ->end()
            ->tab('Дополнительно')
            ->with('Варианты покупки')
            ->add('variations', \Sonata\CoreBundle\Form\Type\CollectionType::class, [
                'label' => 'Характеристики',
                'required' => false,
                'by_reference' => false
            ], [
                'edit' => 'inline',
                'inline' => 'table',
            ])
            ->end()
            ->with('Характеристики товара')
            ->add('attributes', \Sonata\CoreBundle\Form\Type\CollectionType::class, [
                'label' => 'Характеристики',
                'required' => false,
                'by_reference' => false
            ], [
                'edit' => 'inline',
                'inline' => 'table',
            ])
            ->end()
            ->end()
            ->tab('Медиа')
            ->with('Дополнительные изображения и отзывы')
            ->add('gallery', ModelListType::class, [
                'label' => 'Изображения',
                'required' => false
            ], [
                'link_parameters' => [
                    'context' => 'products'
                ]
            ])
            ->add('review', ModelType::class, [
                'label' => 'Отзывы',
                'property' => 'name',
                'required' => false,
                'multiple' => true
            ])
            ->end()
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name', null, [
            'label' => 'Название'
        ]);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('publish', null, [
                'label' => 'Опубликовано',
                'editable' => true,
            ])
            ->add('price', null, [
                'label' => 'Цена',
            ])
            ->addIdentifier('name', null, [
                'label' => 'Название'
            ])
            ->add('category.name', null, [
                'label' => 'Категория'
            ])
            ->add('media', 'string', [
                'template' => '@SonataMedia/MediaAdmin/list_image.html.twig',
                'label' => 'Изображение'
            ]);
    }

    public function configure()
    {
        parent::configure();
//        $this->classnameLabel = 'Товары';
    }

    public function toString($object)
    {
        return $object instanceof Product
            ? $object->getName()
            : 'Товар'; // shown in the breadcrumb on the create view
    }
}
