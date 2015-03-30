<?php

namespace Ebachannel\Front\ThreadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($id)
    {
        //categoryテーブルの中身を$repositoryに入れる
        $repository = $this->getDoctrine()->getRepository('EbachannelFrontThreadBundle:category');
        //全ての商品をfind(SELECT * FROM thread)
        $category = $repository->findAll();
        return $this->render('EbachannelFrontThreadBundle:Default:index.html.twig', array('category' => $category));

    }
}
