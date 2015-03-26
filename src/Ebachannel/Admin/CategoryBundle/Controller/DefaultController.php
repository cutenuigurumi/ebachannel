<?php

namespace Ebachannel\Admin\CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EbachannelAdminCategoryBundle:Default:index.html.twig', array('name' => $name));
    }
}
