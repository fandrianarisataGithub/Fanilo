<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class DefaultController extends AbstractController
{   
    
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    /**
     * @Route("/", name="home")
     */
    public function first():Response
    {
        $user = $this->getUser();
        //dd($user);
        return $this->render("front/home.html.twig");  
    }

    

    /**
     * @Route("/user_register", name="user_register")
     */
    public function user_register():Response
    {   
        return $this->render("security/user_register.html.twig");
    }

    /**
     * @Route("/test_ajout_et", name="test_ajout_et")
     */
    public function test_ajout_et():Response
    {   
        return $this->render("security/test.html.twig");   
    } 
     
    
}