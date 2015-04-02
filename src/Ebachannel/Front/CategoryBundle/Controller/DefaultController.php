<?php

namespace Ebachannel\Front\CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        //categoryテーブルの中身を$repositoryに入れる
        $repository = $this->getDoctrine()->getRepository('EbachannelAdminCategoryBundle:category');
        //全ての商品をfind(SELECT * FROM category)
        $categories = $repository->findAll();
        $count = 0;
        foreach($categories as $category){
      /*      echo "<pre>";
            print_r($category);
            echo "</pre>";    */
            $count = $count + $category->getId();
        }
            return $this->render('EbachannelFrontCategoryBundle:Default:index.html.twig', array('category' => $categories, 'count' => $count));
    }
}
