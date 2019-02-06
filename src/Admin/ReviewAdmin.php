<?php
/**
 * Created by IntelliJ IDEA.
 * User: kirillrossokhin
 * Date: 06.09.2018
 * Time: 13:12
 */

namespace App\Admin;


use App\Entity\Review;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\MediaBundle\Form\Type\MediaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ReviewAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->with('Общее', [
                'class' => 'col-sm-12 col-md-8'
            ])
            ->add('name', TextType::class, [
                'label' => 'Имя'
            ])
            ->add('body', CKEditorType::class, [
                'label' => 'Отзыв'
            ])
            ->add('media', MediaType::class, array(
                'provider' => 'sonata.media.provider.image',
                'context' => 'default',
                'label' => 'Изображение'
            ))
            ->end()
            ->with('Мета', [
                'class' => 'col-sm-12 col-md-4'
            ])
            ->add('publish', CheckboxType::class, [
                'label' => 'Опубликовано',
                'required' => false,
            ])
//            ->add('products', ModelType::class, [
//                'label' => 'Товары',
//                'multiple' => true,
//                'required' => false,
//                'property' => 'name'
//            ])

            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('name', null, [
                'label' => 'Имя'
            ])
            ->add('publish', null, [
                'operator_type' => 'sonata_type_boolean',
                'label' => 'Опубликовано'
        ]);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('name', null, [
                'label' => 'Имя'
            ])
            ->add('publish', null, [
                'editable' => true,
                'label' => 'Опубликовано'
            ])
            ->add('media', 'string', [
                'template' => '@SonataMedia/MediaAdmin/list_image.html.twig',
                'label' => 'Изображение'
            ]);
    }

    public function toString($object)
    {
        return $object instanceof Review
            ? $object->getName()
            : 'Отзыв'; // shown in the breadcrumb on the create view
    }

}
