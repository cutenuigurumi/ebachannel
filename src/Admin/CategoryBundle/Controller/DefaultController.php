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
        $repository = $this->getDoctrine()->getRepository('AdminCategoryBundle:Product');
        //全ての商品をfind(SELECT * FROM Product)
        $product = $repository->findAll();
        return $this->render('AdminCategoryBundle:Default:index.html.twig', array('product' => $product));
    }

    public function newAction(Request $request)
    {
        //productオブジェクトの生成
        $product = new Product();
        
        //formの作成
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

    public function editAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        //select * from Product where id=$idと同じ
        $product = $em->getRepository('AdminCategoryBundle:Product')->find($id);

        //該当のidが見つからなかった時の処理
        if (!$product) {
            throw $this->createNotFoundException('No product found for id '.$id);
        }
        //ここでformを作成している
        $editForm = $this->createEditForm($product);

        return $this->render('AdminCategoryBundle:Default:edit.html.twig', array(
            'product'      => $product,
            'edit_form'   => $editForm->createView(),
        ));
    }
    private function createEditForm($product)
    {
        $form = $this->createForm(new ProductType(), $product, array(
            'action' => $this->generateUrl('product_update', array('id' => $product->getId())),
            'method' => 'PUT',
        ));
        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AdminCategoryBundle:Product')->find($id);

        if (!$product) {
            throw $this->createNotFoundException('Unable to find post entity.');
        }
        //formの作成
        $editForm = $this->createEditForm($product);
        //requestとformをバインドさせる
        $editForm->handleRequest($request);

        //値のチェック
        if ($editForm->isValid()) {
            $em->flush();
        return $this->redirect($this->generateUrl('product', array('id' => $id)));
        }
        
        return $this->render('AdminCategoryBundle:post:edit.html.twig', array(
            'product'      => $product,
            'edit_form'   => $editForm->createView(),
        ));
    }

	public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $product = $em->getRepository('AdminCategoryBundle:Product')->find($id);
        if (!$product) {
		    throw $this->createNotFoundException('No product found for id '.$id);
        }
        $em->remove($product);
        $em->flush();
        return $this->render('AdminCategoryBundle:Default:delete.html.twig', array('product' => $product, 'id'=> $id));
    }


}
