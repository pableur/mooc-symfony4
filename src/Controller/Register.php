<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class Register extends Controller{

    public function acknowledgement(Environment $twig){
		
		echo($_POST['email']);
		echo($request->request->get('page'));
		
		$content = $twig->render('Market/register_acknowledgement.html.twig', array( ));
		return new Response($content);
    }
}