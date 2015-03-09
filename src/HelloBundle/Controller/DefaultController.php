<?php

namespace HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
    	$category1 = array(
    			'category_id' => '1',
    			'category_name' => 'カテゴリ1');
    	$category2 = array(
    			'category_id' => '2',
    			'category_name' => 'カテゴリ2');
    	$category3 = array(
    			'category_id' => '3',
    			'category_name' => 'カテゴリ3');
    	$category4 = array(
    			'category_id' => '4',
    			'category_name' => 'カテゴリ4');
    	$category5 = array(
    			'category_id' => '5',
    			'category_name' => 'カテゴリ5');
    	 
		$user1 = array(
			'username' => 'かてごり',
			'email' => 'ebara@');
		$user2 = array(
			'username' => 'test',
			'email' => 'test@');
		$user3 = array(
			'username' => 'aaa',
			'email' => 'aaa@');
		$categorys = array($category1, $category2, $category3, $category4,$category5);
		$users = array($user1, $user2, $user3);
		$time = date( "Y/m/d (D) H:i:s", time());
        return $this->render('WinRoadHelloBundle:Default:index.html.twig', array('name' => $name, 'time' => $time, 'users' => $users, 'categorys' => $categorys));
		
    }
}
