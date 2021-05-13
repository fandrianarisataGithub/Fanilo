<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Entity\Etablissement;
use App\Repository\EtablissementRepository;
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
     * @Route("/profile/{etablissement_id}", name="home_auth")
     */
    public function home_auth($etablissement_id):Response
    {
        
        $repoEtablissement = $this->getDoctrine()->getRepository(Etablissement::class);
        $etablissement = $repoEtablissement->find($etablissement_id);
        
        $repoArticle = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repoArticle->findBy([], ["createdAt" => "DESC"], 6);
        //dd($articles);
        $user = $this->getUser();
        //dd($user);
        return $this->render("front/home.html.twig", [
            "articles" => $articles
        ]);  
    }

    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        $repoArticle = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repoArticle->findBy([], ["createdAt" => "DESC"], 6);
       
        return $this->render("front/home.html.twig", [
                "articles" => $articles
            ]);
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