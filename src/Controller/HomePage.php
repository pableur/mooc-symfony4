<?php
// src/Controller/HomePage.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomePage
{

    public function home(Environment $twig){
		$content = $twig->render('Market/index.html.twig');
		return new Response($content);
    }
}