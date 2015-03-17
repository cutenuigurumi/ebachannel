<?php

namespace Admin\CategoryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Admin\CategoryBundle\Entity\Product;


class DefaultController extends Controller
{
    public function indexAction()
    {
		//Productテーブルの中身を$repositoryに入れる
        $repository = $this->getDoctrine()
		->getRepository('AdminCategoryBundle:Product');
		//全ての商品をfind(SELECT * FROM Product)
		$product = $repository->findAll();

        return $this->render('AdminCategoryBundle:Default:index.html.twig', array('product' => $product));
    }

    public function newAction()
    {
		//productオブジェクトの生成
        $product = new Product();
		//ダミーデータの生成
        $product->setName('Foo');

		//接続を永続化?
        $em = $this->getDoctrine()->getEntityManager();
		//doctrineにmanageするように伝えている?
        $em->persist($product);
		//データベースに反映
        $em->flush();


        return $this->render('AdminCategoryBundle:Default:new.html.twig', array('product' => $product));

    }
	public function updateAction()
	{
		
		$repository = $this->getDoctrine()
        ->getRepository('AdminCategoryBundle:Product');
        //全ての商品をfind(SELECT * FROM Product)
		

        return $this->render('AdminCategoryBundle:Default:edit.html.twig', array('product' => $product));


	}

}
