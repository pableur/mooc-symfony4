<?php
// src/Controller/HomePage.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomePage extends Controller
{

    public function home(Environment $twig){
		$listCategory = $this
		  ->getDoctrine()
		  ->getManager()
		  ->getRepository( \App\Entity\Category::class)->findAll();

		$listShop = $this
		  ->getDoctrine()
		  ->getManager()
		  ->getRepository( \App\Entity\Shop::class)->findAll();
		
		$content = $twig->render('Market/index.html.twig', array(
			'listCategory' => $listCategory,
			'listShop' => $listShop,
			'listShopSpotlight' => $listShop,
			//'deadLink'=> $this->generateUrl('app_market_comingsoon')
			'deadLink'=>"/mooc-symfony4/public/index.php/comingsoon"
		));
		return new Response($content);
    }
}