<?php

namespace Ebachannel\Front\ThreadBundle\Controller;

use Ebachannel\Front\ThreadBundle\Form\threadType;
use Symfony\Component\HttpFoundation\Request;
use Ebachannel\Admin\CategoryBundle\Entity\category;
use Ebachannel\Admin\CategoryBundle\Entity\thread;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($category_id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $category = $em->getRepository('EbachannelAdminCategoryBundle:category')->find($category_id);
        $thread = $em->getRepository('EbachannelAdminCategoryBundle:thread')->findAll($category_id);
        
        //該当のidが見つからなかった時の処理
        if (!$category) {
            throw $this->createNotFoundException('No category found for id '.$category_id);
        }
        return $this->render('EbachannelFrontThreadBundle:Default:index.html.twig', array('category' => $category,'thread' => $thread));
    }
    public function newAction(Request $request, $category_id)
    {
        //threadオブジェクトの生成
        $thread = new thread();
    
        //formの作成
        $form = $this->createForm(new threadType(), $thread);
        if ($request->getMethod() == 'POST') {
            //bindRequestが呼び出された時点でフォームに反映される
            $form->bind($request);
            if ($form->isValid()) {
                //Entityマネージャー
                $em = $this->getDoctrine()->getEntityManager();
                //プログラム側のエンティティに追加
                $em->persist($thread);
                //データベースに反映
                $em->flush();
                return $this->redirect($this->generateUrl('front_thread_index'), array('category_id' => $category_id));
            }
        }
        return $this->render('EbachannelAdminCategoryBundle:Default:new.html.twig', array('thread' => $thread,  'form' => $form->createView()));
    }
}
