<?php

namespace admin\CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
		for($i = 1; $i < 10; $i++){
			$categorys[$i] = 'カテゴリ'.$i;
		}

        return $this->render('adminCategoryBundle:Default:index.html.twig', array('name' => $name, 'categorys' => $categorys));
    }
}
