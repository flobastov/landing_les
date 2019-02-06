<?php
/**
 * Created by IntelliJ IDEA.
 * User: kirillrossokhin
 * Date: 05.09.2018
 * Time: 15:44
 */

namespace App\Admin;

use App\Entity\BlogCategory;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\MediaBundle\Form\Type\MediaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class BlogCategoryAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', TextType::class, [
                'label' => 'Название'
            ])
            ->add('slug', TextType::class, [
                'label' => 'Символическая ссылка',
                'required' => false,
                'disabled' => true,
            ])
            ->add('media', MediaType::class, [
                'provider' => 'sonata.media.provider.image',
                'context' => 'news',
                'label' => 'Изображение',
                'required' => false
            ]);
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
            ->addIdentifier('name', null, [
                'label' => 'Название'
            ])->add('media', 'string', [
                'template' => '@SonataMedia/MediaAdmin/list_image.html.twig',
                'label' => 'Изображение'
            ]);
    }

    public function toString($object)
    {
        return $object instanceof BlogCategory
            ? $object->getName()
            : 'Новость'; // shown in the breadcrumb on the create view
    }

}
