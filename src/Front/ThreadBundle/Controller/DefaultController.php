<?php

namespace Front\ThreadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FrontThreadBundle:Default:index.html.twig', array('name' => $name));
    }
}
