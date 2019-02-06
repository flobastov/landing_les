<?php
/**
 * Created by IntelliJ IDEA.
 * User: kirillrossokhin
 * Date: 10.09.2018
 * Time: 12:49
 */

namespace App\Admin;


use App\Entity\Menu;
use App\Entity\Page;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MenuAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->with('Общее')
            ->add('name', TextType::class, [
                'label' => 'Имя'
            ])
            ->add('type', ChoiceFieldMaskType::class, [
                'choices' => [
                    'Ссылка' => 'link',
                    'Ссылка на внешний ресурс' => 'external_link',
                    'Ссылка на сгенерированную страницу' => 'page_link',
                ],
                'map' => [
                    'link' => ['link'],
                    'external_link' => ['link'],
                    'page_link' => ['page'],
                ],
                'label' => 'Тип пункта меню'
            ])
            ->add('link', TextType::class, [
                'label' => 'Ссылка',
                'required' => false
            ])
            ->add('page', ModelType::class, [
                'class' => Page::class,
                'property' => 'title',
                'label' => 'Страница',
                'required' => false
            ])
            ->add('weight', NumberType::class, [
                'label' => 'Порядок сортировки'
            ])
            ->end()
        ;
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('id')
            ->add('weight', null, [
                'editable' => true,
                'label' => 'Вес'
            ])
            ->addIdentifier('name', null, [
                'label' => 'Имя'
            ]);
    }

    public function toString($object)
    {
        return $object instanceof Menu
            ? $object->getName()
            : 'Блок'; // shown in the breadcrumb on the create view
    }
}
