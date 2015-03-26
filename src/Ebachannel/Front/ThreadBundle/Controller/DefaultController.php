<?php

namespace Ebachannel\Front\ThreadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EbachannelFrontThreadBundle:Default:index.html.twig', array('name' => $name));
    }
}
