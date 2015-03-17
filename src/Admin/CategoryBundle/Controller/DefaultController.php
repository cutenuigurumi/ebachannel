<?php

namespace Admin\CategoryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Admin\CategoryBundle\Entity\Product;


class DefaultController extends Controller
{
    public function indexAction()
    {
		//
        $repository = $this->getDoctrine()
		->getRepository('AdminCategoryBundle:Product');
		//全ての商品をfind(SELECT * FROM Product)
		$product = $repository->findAll();

 	   if (!$product) {
    	    throw $this->createNotFoundException('No product found for id '.$id);
 	   }
        return $this->render('AdminCategoryBundle:Default:index.html.twig', array('product' => $product));
    }

    public function newAction()
    {
        $product = new Product();
        $product->setName('Foo');
        $product->setPrice(19.99);

		//接続を永続化	
        $em = $this->getDoctrine()->getEntityManager();
		//doctrineにmanageするように伝えている
        $em->persist($product);
        $em->flush();

        return $this->render('AdminCategoryBundle:Default:new.html.twig', array('product' => $product));

    }
	public function updateAction()
	{

		$repository = $this->getDoctrine()
        ->getRepository('AdminCategoryBundle:Product');
        //全ての商品をfind(SELECT * FROM Product)
		$product = $repository->findOneById($id);

        return $this->render('AdminCategoryBundle:Default:edit.html.twig', array('product' => $product));


	}

}
