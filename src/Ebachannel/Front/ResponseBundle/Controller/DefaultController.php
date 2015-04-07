<?php

namespace Ebachannel\Front\ResponseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ebachannel\Front\ResponseBundle\Form\responseType;
use Symfony\Component\HttpFoundation\Request;
use Ebachannel\Admin\CategoryBundle\Entity\thread;
use Ebachannel\Admin\CategoryBundle\Entity\response;

class DefaultController extends Controller
{
    public function indexAction($thread_id)
    {
        $repository = $this->getDoctrine()->getRepository('EbachannelAdminCategoryBundle:response');
        for($i = 1; $i< 1000; $i++){
            $response = $repository->findOneBy(array('no' => $i, 'threadId' => $thread_id));
        }
        $repository = $this->getDoctrine()->getRepository('EbachannelAdminCategoryBundle:thread');
        $thread = $repository->find(array('id' => $thread_id));
        
        return $this->render('EbachannelFrontResponseBundle:Default:index.html.twig', array('thread' => $thread, 'response' => $response, 'thread_id' => $thread_id));
    }
    public function newAction(Request $request, $thread_id)
    {    
        $count = $this->getEntityManager()
            ->createQuery('SELECT COUNT(thread_id) FROM EbachanAdminCategoryBundle:response')
            ->getSingleScalarResult;

        if(isNULL($responses->getNo())){
            $no = 2;
        }else {
            $no = $responses->getNo() + 1;
        }
        //select count(thread_id) from response where thread_id = $thread_id 
        
        $response = new response();
        $response->setThreadId($thread_id)
            ->setNo($no);
        
        //formの作成
        $form = $this->createForm(new responseType(), $response);
        if ($request->getMethod() == 'POST') {
            //bindRequestが呼び出された時点でフォームに反映される
            $form->bind($request);
            if ($form->isValid()) {
                //Entityマネージャー
                $em = $this->getDoctrine()->getEntityManager();
                //プログラム側のエンティティに追加
                $em->persist($response);
                //データベースに反映
                $em->flush();
                return $this->redirect($this->generateUrl('front_response_index', array('thread_id' => $thread_id)));
            }
        }
        return $this->render('EbachannelFrontResponseBundle:Default:new.html.twig', array('thread_id' => $thread_id, 'response' => $response,  'form' => $form->createView()));
    }
}