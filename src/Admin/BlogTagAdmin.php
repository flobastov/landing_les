<?php
/**
 * Created by IntelliJ IDEA.
 * User: kirillrossokhin
 * Date: 07.09.2018
 * Time: 13:18
 */

namespace App\Admin;


use App\Entity\BlogTag;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BlogTagAdmin extends AbstractAdmin
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
        return $object instanceof BlogTag
            ? $object->getName()
            : 'Новость'; // shown in the breadcrumb on the create view
    }
}
