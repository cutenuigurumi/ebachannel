<?php

namespace Admin\CategoryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Admin\CategoryBundle\Entity\Product;
use Admin\CategoryBundle\Form\ProductType;


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

    public function newAction(Request $request)
    {
		//productオブジェクトの生成
        $product = new Product();
		//ダミーデータの生成

        $form = $this->createFormBuilder($product)
			->add('name', 'text')
			->getForm();
		if ($request->getMethod() == 'POST') {
			//bindRequestが呼び出された時点でフォームに反映される
 			$form->bind($request);
			if ($form->isValid()) {
		//Entityマネージャー
        $em = $this->getDoctrine()->getEntityManager();
		//プログラム側のエンティティに追加
        $em->persist($product);
		//データベースに反映
        $em->flush();

		return $this->redirect($this->generateUrl('product'));

			
			}
		}
        return $this->render('AdminCategoryBundle:Default:new.html.twig', array('product' => $product,  'form' => $form->createView()));



    }
	public function editAction($id)
	{
		$em = $this->getDoctrine()->getEntityManager();
		$product = $em->getRepository('AdminCategoryBundle:Product')->find($id);
		if (!$product) {
			throw $this->createNotFoundException('No product found for id '.$id);
		}
		$product->setName('変更しました');
		$em->flush();

		return $this->render('AdminCategoryBundle:Default:edit.html.twig', array('product' => $product));
	}
	public function deleteAction($id)
	{
		$em = $this->getDoctrine()->getEntityManager();
		$product = $em->getRepository('AdminCategoryBundle:Product')->find($id);
		if (!$product) {
			throw $this->createNotFoundException('No product found for id '.$id);
		}
		$em->remove($product);
		$em->flush();
        return $this->render('AdminCategoryBundle:Default:delete.html.twig', array('product' => $product));

	}


}
