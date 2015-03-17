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

    public function newAction(Request $request)
    {
        // Productオブジェクトを作成し、ダミーデータを設定する
        $product = new Product();

        $form = $this->createFormBuilder($product)
            ->add('name', 'text')
            ->getForm();
	    if ($request->getMethod() == 'POST') {
	        $form->bindRequest($request);
			if ($form->isValid()) {
    	        // データベースへの保存など、何らかのアクションを実行する

        return $this->render('AdminCategoryBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
		    }
		}
	}
}
