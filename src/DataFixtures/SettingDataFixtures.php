<?php
/**
 * Created by IntelliJ IDEA.
 * User: kirillrossokhin
 * Date: 07.09.2018
 * Time: 11:23
 */

namespace App\DataFixtures;


use App\Entity\Setting;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SettingDataFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $settings = [
            [
                'code' => 'email',
                'name' => 'Email',
                'value' => 'ip.shupletsov@yandex.ru',
            ],
            [
                'code' => 'sitename',
                'name' => 'Имя сайта',
                'value' => '',
            ],
            [
                'code' => 'main_phone',
                'name' => 'Телефон',
                'value' => '+7 (922) 953-62-69',
            ],
            [
                'code' => 'production_phone',
                'name' => 'Телефон производстава',
                'value' => '+7 (922) 953-62-69',
            ],
            [
                'code' => 'sales_phone',
                'name' => 'Телефон отдела продаж',
                'value' => '+7 (922) 953-10-88',
            ],
            [
                'code' => 'sales_second_phone',
                'name' => 'Телефон отдела продаж',
                'value' => '+7 (922) 953-62-69',
            ],
            [
                'code' => 'production_address',
                'name' => 'Адресс производства',
                'value' => 'Кировская область, Нагорский<br>район, дер.
                                Шевырталово',
            ],
            [
                'code' => 'sales_address',
                'name' => 'Адресс отдела продаж',
                'value' => 'г. Киров, ул. Профсоюзная, 1,<br>БЦ «Кристалл»,
                                офис 507/2',
            ],
            [
                'code' => 'keywords',
                'name' => 'Ключевые слова',
                'value' => '',
            ],
            [
                'code' => 'description',
                'name' => 'Описание',
                'value' => '',
            ]
        ];

        foreach ($settings as $setting) {
            $s = new Setting();
            $s->setCode($setting['code']);
            $s->setName($setting['name']);
            $s->setValue($setting['value']);

            $manager->persist($s);
        }

        $manager->flush();
    }

}
