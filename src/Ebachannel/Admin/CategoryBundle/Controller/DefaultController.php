<?php

namespace Ebachannel\Admin\CategoryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ebachannel\Admin\CategoryBundle\Entity\category;
use Ebachannel\Admin\CategoryBundle\Form\categoryType;


class DefaultController extends Controller
{
    public function indexAction()
    {
        //categoryテーブルの中身を$repositoryに入れる
        $repository = $this->getDoctrine()->getRepository('EbachannelAdminCategoryBundle:category');
        //全ての商品をfind(SELECT * FROM category)
        $category = $repository->findAll();
        
        return $this->render('EbachannelAdminCategoryBundle:Default:index.html.twig', array('category' => $category));
    }
    public function newAction(Request $request)
    {
        //categoryオブジェクトの生成
        $category = new category();
        
        //formの作成
        $form = $this->createFormBuilder($category)
            ->add('name', 'text')
            ->getForm();
        if ($request->getMethod() == 'POST') {
            //bindRequestが呼び出された時点でフォームに反映される
            $form->bind($request);
            if ($form->isValid()) {
                //Entityマネージャー
                $em = $this->getDoctrine()->getEntityManager();
                //プログラム側のエンティティに追加
                $em->persist($category);
                //データベースに反映
                $em->flush();
                return $this->redirect($this->generateUrl('category_index'));
            }
        }
        return $this->render('EbachannelAdminCategoryBundle:Default:new.html.twig', array('category' => $category,  'form' => $form->createView()));
    }
    public function editAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        //select * from category where id=$idと同じ
        $category = $em->getRepository('EbachannelAdminCategoryBundle:category')->find($id);
        //該当のidが見つからなかった時の処理
        if (!$category) {
            throw $this->createNotFoundException('No category found for id '.$id);
        }
        //ここでformを作成している
        $editForm = $this->createEditForm($category);
        return $this->render('EbachannelAdminCategoryBundle:Default:edit.html.twig', array(
            'category'      => $category,
            'edit_form'   => $editForm->createView(),
        ));
    }
    private function createEditForm($category)
    { 
        $form = $this->createForm(new categoryType(), $category, array(
            'action' => $this->generateUrl('category_update', array('id' => $category->getId())),
            'method' => 'PUT',
        ));
        $form->add('submit', 'submit', array('label' => 'Update'));
        return $form;
    }
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('EbachannelAdminCategoryBundle:category')->find($id);
        if (!$category) {
            throw $this->createNotFoundException('Unable to find post entity.');
        }
        //formの作成
        $editForm = $this->createEditForm($category);
        //requestとformをバインドさせる
        $editForm->handleRequest($request);
        //値のチェック
        if ($editForm->isValid()) {
            $em->flush();
            return $this->redirect($this->generateUrl('category_index', array('id' => $id)));
        }
        
        return $this->render('EbachannelAdminCategoryBundle:Default:edit.html.twig', array(
            'category'      => $category,
            'edit_form'   => $editForm->createView(),
        ));
    }
	public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $category = $em->getRepository('EbachannelAdminCategoryBundle:category')->find($id);
        if (!$category) {
            throw $this->createNotFoundException('No category found for id '.$id);
        }
        $em->remove($category);
        $em->flush();
        return $this->render('EbachannelAdminCategoryBundle:Default:delete.html.twig', array('category' => $category, 'id'=> $id));
    }
}
