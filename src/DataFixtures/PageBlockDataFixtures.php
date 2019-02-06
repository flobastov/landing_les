<?php
/**
 * Created by IntelliJ IDEA.
 * User: LobastovG
 * Date: 09.01.2019
 * Time: 13:55
 */

namespace App\DataFixtures;


use App\Entity\PageBlock;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PageBlockDataFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $blocks = [
            [
                'code' => 'product_round_log',
                'name' => 'Оцилиндрованное бревно',
                'type' => 'html',
                'body' => '
                <div class="b-content-desc">
                    <p>Фрезерованное бревно, которое прошло механическую обработку на специальном оборудовании и имеет
                        одинаковый диаметр по всей длине. Оцилиндрованное бревно имеет природную красоту натуральной
                        текстуры дерева,  и является экологически чистым материалом.</p>
                </div>
                <div class="b-space"></div>
                <div class="b-table">
                    <div class="b-table__title">Цены</div>
                    <div class="b-table__table">
                        <table class="b-table-even">
                            <thead>
                            <tr>
                                <th rowspan="2">Диаметр бревна<br>
                                    D мм.
                                </th>
                                <th colspan="2">Стоимость (с чашками под проект)<br>
                                    (Ель, Сосна), руб. / за 1 м3
                                </th>
                                <th rowspan="2">Обработка транспортным<br>антисептиком в летний<br>период руб. / за 1 м3
                                </th>
                            </tr>
                            <tr>
                                <th>Лунный паз</th>
                                <th>Финский паз</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>160</td>
                                <td>8 000</td>
                                <td>—</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>180</td>
                                <td>8 000</td>
                                <td>—</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>200</td>
                                <td>8 300</td>
                                <td>—</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>220</td>
                                <td>8 500</td>
                                <td>8 900</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>240</td>
                                <td>8 700</td>
                                <td>9 000</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>260</td>
                                <td>8 700</td>
                                <td>8 900</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>280</td>
                                <td>9 000</td>
                                <td>9 300</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>300</td>
                                <td>9 200</td>
                                <td>9 500</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>320</td>
                                <td>9 200</td>
                                <td>9 700</td>
                                <td>300</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>',
            ],
            [
                'code' => 'product_edged_lumber',
                'name' => 'Обрезной пиломатериал естественной влажности',
                'type' => 'html',
                'body' => '
                <div class="b-content-desc">
                                <p>Продукция из древесины установленных размеров и качества, полученная путем
                                    продольного
                                    пиления брёвен, на специальном лесопильном оборудовании. Основной сферой применения
                                    обрезного пиломатериала является строительство.
                                </p>
                            </div>
                <div class="b-space"></div>
                <div class="b-table">
                                <div class="b-table__title">Цены</div>
                                <div class="b-table__table">
                                    <table class="b-table-odd">
                                        <thead>
                                        <tr>
                                            <th>Толщина, мм</th>
                                            <th>Ширина, мм</th>
                                            <th>Длина, м</th>
                                            <th>Стоимость за 1 м3<br>
                                                (ель, сосна), сорт 1-2
                                            </th>
                                            <th>Стоимость за 1 м3<br>
                                                (ель, сосна), сорт 3
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>25</td>
                                            <td>50</td>
                                            <td>3</td>
                                            <td>8 500</td>
                                            <td>7 000</td>
                                        </tr>
                                        <tr>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>3-6</td>
                                            <td>8 500</td>
                                            <td>7 000</td>
                                        </tr>
                                        <tr>
                                            <td>25</td>
                                            <td>100</td>
                                            <td>3-6</td>
                                            <td>8 500</td>
                                            <td>7 000</td>
                                        </tr>
                                        <tr>
                                            <td>25</td>
                                            <td>150</td>
                                            <td>3-6</td>
                                            <td>8 700</td>
                                            <td>7 000</td>
                                        </tr>
                                        <tr>
                                            <td>50</td>
                                            <td>150</td>
                                            <td>3-6</td>
                                            <td>8 700</td>
                                            <td>7 000</td>
                                        </tr>
                                        <tr>
                                            <td>50</td>
                                            <td>200</td>
                                            <td>3-6</td>
                                            <td>8 700</td>
                                            <td>7 000</td>
                                        </tr>
                                        <tr>
                                            <td>100</td>
                                            <td>100</td>
                                            <td>6</td>
                                            <td>9 000</td>
                                            <td>—</td>
                                        </tr>
                                        <tr>
                                            <td>100</td>
                                            <td>150</td>
                                            <td>6</td>
                                            <td>9 000</td>
                                            <td>—</td>
                                        </tr>
                                        <tr>
                                            <td>150</td>
                                            <td>150</td>
                                            <td>6</td>
                                            <td>9 000</td>
                                            <td>—</td>
                                        </tr>
                                        <tr>
                                            <td>100</td>
                                            <td>200</td>
                                            <td>6</td>
                                            <td>9 000</td>
                                            <td>—</td>
                                        </tr>
                                        <tr>
                                            <td>150</td>
                                            <td>200</td>
                                            <td>6</td>
                                            <td>9 000</td>
                                            <td>—</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>',
            ],
            [
                'code' => 'product_lining',
                'name' => 'Вагонка',
                'type' => 'html',
                'body' => '',
            ],
            [
                'code' => 'product_floor_board',
                'name' => 'Доска пола',
                'type' => 'html',
                'body' => '',
            ],
            [
                'code' => 'product_block_house',
                'name' => 'Блокхаус',
                'type' => 'html',
                'body' => '',
            ],
            [
                'code' => 'product_planed_timber',
                'name' => 'Имитация строганного бруса',
                'type' => 'html',
                'body' => '',
            ],
            [
                'code' => 'product_chopped_log',
                'name' => 'Рубленное бревно',
                'type' => 'html',
                'body' => '
                <div class="b-content-desc">
                    <p>Фрезерованное бревно, которое прошло механическую обработку на специальном оборудовании и имеет
                        одинаковый диаметр по всей длине. Оцилиндрованное бревно имеет природную красоту натуральной
                        текстуры дерева,  и является экологически чистым материалом.</p>
                </div>
                <div class="b-space"></div>
                <div class="b-table">
                    <div class="b-table__title">Цены</div>
                    <div class="b-table__table">
                        <table class="b-table-odd">
                            <thead>
                            <tr>
                                <th>Диаметр бревна<br>
                                    D мм.
                                </th>
                                <th>Материал: ель, сосна<br>
                                    Цена за 1 м3
                                </th>
                                <th>Обработка транспортным<br>антисептиком в летний<br>период руб. / за 1 м3</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>160</td>
                                <td>8 000 ₽</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>180</td>
                                <td>8 000 ₽</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>200</td>
                                <td>8 300 ₽</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>220</td>
                                <td>8 500 ₽</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>220</td>
                                <td>8 500 ₽</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>240</td>
                                <td>8 700 ₽</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>260</td>
                                <td>8 700 ₽</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>280</td>
                                <td>9 000 ₽</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>300</td>
                                <td>9 200 ₽</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>320</td>
                                <td>9 200 ₽</td>
                                <td>300</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>',
            ],
            [
                'code' => 'about_company',
                'name' => 'О нас',
                'type' => 'html',
                'body' => '
                <p>ЛПК «Forder» заготавливает и перерабатывает древесину с 2010 года.</p>
                <p>Основным видом деятельности нашей компании является продажа оцилиндрованного бревна и пиломатериалов естественной влажности.</p>
                <p><b>Кроме этого, ЛПК «Forder» оказывает услуги:</b></p>
                <ul>
                    <li>Проектирования домов из бруса и бревна;</li>
                    <li>Составление смет для строительства;</li>
                    <li>Перевозку грузов по России;</li>
                    <li>Оформление документов для отправки материала за границу.</li>
                </ul>',
            ]
        ];

        foreach ($blocks as $block) {
            $s = new PageBlock();
            $s->setCode($block['code']);
            $s->setName($block['name']);
            $s->setType($block['type']);
            $s->setBody($block['body']);

            $manager->persist($s);
        }

        $manager->flush();
    }
}
