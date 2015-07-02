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
        $nothing_message = '';
        $em = $this->getDoctrine()->getEntityManager();
        $category = $em->getRepository('EbachannelAdminCategoryBundle:category')->find($category_id);
        //select * from thread where id = category_id;
        $thread = $em->getRepository('EbachannelAdminCategoryBundle:thread')->findBy(array('category_id' => $category_id));
        //該当のidが見つからなかった時の処理
        if (!$category) {
            return $this->render('EbachannelFrontThreadBundle:Default:error.html.twig');
        }
        if (!$thread) {
            $nothing_message = 'スレッドがまだありません。。';
        }
        return $this->render('EbachannelFrontThreadBundle:Default:index.html.twig', array('category' => $category,'thread' => $thread, 'nothing_message' => $nothing_message));
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
                $thread->setCategoryId($category_id);
                
                //Entityマネージャー
                $em = $this->getDoctrine()->getEntityManager();
                //プログラム側のエンティティに追加
                $em->persist($thread);
                //データベースに反映
                $em->flush();
                return $this->redirect($this->generateUrl('front_thread_index', array('category_id' => $category_id)));
            }
        }
        return $this->render('EbachannelFrontThreadBundle:Default:new.html.twig', array('category_id' => $category_id, 'thread' => $thread,  'form' => $form->createView()));
    }
}
