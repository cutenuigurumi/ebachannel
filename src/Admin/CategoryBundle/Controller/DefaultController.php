<?php

namespace Admin\CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($page)
    {
		for($i = 1; $i < 10; $i++){
            $categorys[$i] = 'カテゴリ'.$i;
		}
        return $this->render('AdminCategoryBundle:Default:index.html.twig', array('page' => $page, 'categorys' => $categorys));
    }
}
