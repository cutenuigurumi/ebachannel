<?php

namespace Ebachannel\Front\ThreadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Ebachannel\Admin\CategoryBundle\Entity\category;
use Ebachannel\Front\ThreadBundle\Entity\thread;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $category = $em->getRepository('EbachannelAdminCategoryBundle:category')->find($id);
        $thread = $em->getRepository('EbachannelFrontThreadBundle:thread')->findAll($id);
        
        //該当のidが見つからなかった時の処理
        if (!$category) {
            throw $this->createNotFoundException('No category found for id '.$id);
        }
        return $this->render('EbachannelFrontThreadBundle:Default:index.html.twig', array('category' => $category, 'id' =>$id));

    }
}
