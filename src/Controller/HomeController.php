<?php
/**
 * Created by IntelliJ IDEA.
 * User: kirillrossokhin
 * Date: 07.09.2018
 * Time: 14:48
 */

namespace App\Controller;

use App\Repository\PageBlockRepository;
use App\Repository\SettingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function index(PageBlockRepository $pageBlockRepository, SettingRepository $settingRepository)
    {
        $blocks = $pageBlockRepository->findByPage();
        $settings = $settingRepository->findByPage();

        return $this->render('home.html.twig', ['blocks' => $blocks, 'settings' => $settings]);
    }

    public function showHeader(SettingRepository $settingRepository)
    {
        $settings = $settingRepository->findByPage();
        return $this->render('parts/_header.html.twig', ['settings' => $settings]);
    }

    public function showFooter()
    {
        return $this->render('parts/_footer.html.twig');
    }

}
