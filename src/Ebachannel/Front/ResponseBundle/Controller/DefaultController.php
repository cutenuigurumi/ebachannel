<?php

namespace Ebachannel\Front\ResponseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ebachannel\Front\ResponseBundle\Form\responseType;
use Symfony\Component\HttpFoundation\Request;
use Ebachannel\Admin\CategoryBundle\Entity\thread;
use Ebachannel\Admin\CategoryBundle\Entity\response;

//1の書き込みにたいして他のユーザがレスポンスを返していくので、新規ユーザ登録時に＋2の固定値を用意しておく
define("NEW_RESPONSE", "2");

//フロント側のレスポンスコントローラー
class DefaultController extends Controller
{
    public function indexAction($thread_id)
    {
        $repository = $this->getDoctrine()->getRepository('EbachannelAdminCategoryBundle:response');
        $responses = $repository->findBy(array('threadId' => $thread_id));
        $repository = $this->getDoctrine()->getRepository('EbachannelAdminCategoryBundle:thread');
        $thread = $repository->find(array('id' => $thread_id));
//         print_r($responses);
        return $this->render('EbachannelFrontResponseBundle:Default:index.html.twig', array('thread' => $thread, 'responses' => $responses, 'thread_id' => $thread_id));
    }
    public function newAction(Request $request, $thread_id)
    {    
        //select count(thread_id) from response where thread_id = $thread_id
        $repository = $this->getDoctrine()->getManager()->getRepository('EbachannelAdminCategoryBundle:response');
        $qb = $repository->createQuerybuilder('res');
        $qb->select('COUNT(res.threadId)');
        $qb->where("res.threadId = $thread_id");
        $count = $qb->getQuery()->getSingleScalarResult();
        if(is_null($count)){
            $no = NEW_RESPONSE;
        }else{
            $no = $count + NEW_RESPONSE;
        }
        $response = new response();

        //formの作成
        $form = $this->createForm(new responseType(), $response);
        if ($request->getMethod() == 'POST') {
            //bindRequestが呼び出された時点でフォームに反映される
            $form->bind($request);
            if ($form->isValid()) {
                $response->setThreadId($thread_id)
                ->setNo($no);
                
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