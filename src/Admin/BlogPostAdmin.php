<?php
/**
 * Created by IntelliJ IDEA.
 * User: kirillrossokhin
 * Date: 05.09.2018
 * Time: 15:52
 */

namespace App\Admin;

use App\Entity\BlogCategory;
use App\Entity\BlogPost;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\MediaBundle\Form\Type\MediaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BlogPostAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content', [
                'class' => 'col-md-9',
                'label' => 'Основное'
            ])
            ->add('title', TextType::class, [
                'label' => 'Заголовок'
            ])
            ->add('body', CKEditorType::class, [
                'label' => 'Содержимое'
            ])
            ->add('media', MediaType::class, [
                'provider' => 'sonata.media.provider.image',
                'context' => 'news',
                'label' => 'Изображение',
                'required' => false
            ])
            ->end()
            ->with('Meta data', [
                'class' => 'col-md-3',
                'label' => 'Мета'
            ])
            ->add('slug', TextType::class, [
                'label' => 'Символическая ссылка',
                'required' => false,
                'disabled' => true
            ])
            ->add('publish', CheckboxType::class, [
                'label' => 'Опубликовано',
                'required' => false,
            ])
            ->add('category', ModelType::class, [
                'class' => BlogCategory::class,
                'property' => 'name',
                'label' => 'Категория'
            ])
            ->add('blogTags', ModelType::class, [
                'multiple' => true,
                'property' => 'name',
                'label' => 'Теги',
                'required' => false
            ])
            ->end();
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('publish', null, [
                'editable' => true,
                'label' => 'Опубликовано'
            ])
            ->add('category.name', null, [
                'label' => 'Категория',
            ])
            ->addIdentifier('title', null, [
                'label' => 'Заголовок'
            ])->add('media', 'string', [
                'template' => '@SonataMedia/MediaAdmin/list_image.html.twig',
                'label' => 'Изображение'
            ]);

    }

    public function toString($object)
    {
        return $object instanceof BlogPost
            ? $object->getTitle()
            : 'Новость'; // shown in the breadcrumb on the create view
    }
}
