<?php
/**
 * Created by IntelliJ IDEA.
 * User: kirillrossokhin
 * Date: 12.09.2018
 * Time: 10:32
 */

namespace App\Admin;


use App\Application\Sonata\UserBundle\Entity\User;
use App\Entity\ProductOrder;
use App\Entity\ProductOrderStatus;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\CoreBundle\Form\Type\ImmutableArrayType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductOrderAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->tab('Заказ')
            ->with('Общее')
            ->add('id', NumberType::class, [
                'label' => 'Номер заказа',
                'disabled' => true,
                'help' => 'Номер заказа формирутеся автоматически'
            ])
            ->add('status', ModelType::class, [
                'label' => 'Статус',
                'class' => ProductOrderStatus::class,
                'property' => 'name',
                'btn_add' => false,
            ])
            ->add('items', \Sonata\CoreBundle\Form\Type\CollectionType::class, [
                'label' => 'Позиции заказа',
                'required' => false,
                'by_reference' => false
            ], [
                'edit' => 'inline',
                'inline' => 'table',
            ])
            ->end()
            ->end()
            ->tab('Покупатель')
            ->with('Информация о покупателе')
            ->add('user_type', ChoiceFieldMaskType::class, [
                'choices' => [
                    'Зарегистрированный пользователь' => 'register',
                    'Анонимный пользователь' => 'anonymous',
                ],
                'map' => [
                    'register' => ['user'],
                    'anonymous' => ['user_settings'],
                ],
                'label' => 'Тип пользователя',
                'required' => true
            ])
            ->add('user', ModelType::class, [
                'class' => User::class,
                'required' => false,
                'label' => 'Пользователь',
                'help' => 'Имя пользователя, если пользователь зарегистрирован',
                'btn_add' => false,
            ])
            ->add('user_settings', ImmutableArrayType::class, [
                'label' => 'Дополнительные настройки',
                'required' => false,
                'keys' => [
                    ['name', TextType::class, [
                        'label' => 'Имя'
                    ]],
                    ['phone', TelType::class, [
                        'label' => 'Телефон'
                    ]],

                    ['email', EmailType::class, [
                        'label' => 'Email'
                    ]],
                    ['address', TextType::class, [
                        'label' => 'Адрес'
                    ]],
                ]
            ])
            ->end()
            ->end();
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('id', null, [
                'label' => 'Номер заказа'
            ])
            ->add('status.name', null, [
                'label' => 'Статус',
            ])
            ->add('created_at', null, [
                'label' => 'Создан'
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('id', null, [
                'label' => 'Номер заказа'
            ])
            ->add('status.name', null, [
                'label' => 'Статус',
                'class' => ProductOrderStatus::class,
                'property' => 'name',
            ]);
    }

    public function toString($object)
    {
        return $object instanceof ProductOrder
            ? 'Заказ № ' . $object->getId()
            : 'Заказ'; // shown in the breadcrumb on the create view
    }

    protected static function getTypeChoices()
    {
        $choices = [
            'В обработке' => 'processing',
        ];

        return $choices;
    }
}
