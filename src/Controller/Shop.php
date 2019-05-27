<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class Shop extends Controller{

    public function shopView(Environment $twig, $page){
		$shop = $this
		  ->getDoctrine()
		  ->getManager()
		  ->getRepository( \App\Entity\Shop::class)->findById($page);		 

		 $listItem=$this
		  ->getDoctrine()
		  ->getManager()
		  ->getRepository( \App\Entity\Item::class)->findByShop($shop[0]);

		$content = $twig->render('Market/shop.html.twig', array( 'shop' => $shop[0], 'listItem'=>$listItem,'deadLink'=>"/mooc-symfony4/public/index.php/comingsoon"));
		return new Response($content);
    }
}