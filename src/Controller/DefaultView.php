<?php

namespace App\Controller;

use App\Entity\User;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DefaultView extends Controller{

    public function comingsoon(Environment $twig){
		// On crée un objet Advert
		$user = new User();

		// On crée le FormBuilder grâce au service form factory
		$formBuilder = $this->createFormBuilder($user);

		// On ajoute les champs de l'entité que l'on veut à notre formulaire
		$formBuilder
		  ->add('mail',      TextType::class)
		;
		// Pour l'instant, pas de candidatures, catégories, etc., on les gérera plus tard

		$content = $twig->render('Market/work_in_progress.html.twig', array('visitorLink'=>"/mooc-symfony4/public/index.php/registerAcknowledgement", 'formVisitor'=>$formVisitor->getForm()->createView()));
		return new Response($content);
    }
}