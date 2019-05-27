<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class Item extends Controller{

    public function item(Environment $twig, $page){

		 $item=$this
		  ->getDoctrine()
		  ->getManager()
		  ->getRepository( \App\Entity\Item::class)->findById($page);
		  
		$shop = $item[0]->getShop();	
		$listItem=$this
		  ->getDoctrine()
		  ->getManager()
		  ->getRepository( \App\Entity\Item::class)->findByShop($shop);
		
		$content = $twig->render('Market/item.html.twig', array('shop' => $shop, 'item' => $item[0], 'listItem' => $listItem, 'deadLink'=>"/mooc-symfony4/public/index.php/comingsoon"));
		return new Response($content);
    }
}