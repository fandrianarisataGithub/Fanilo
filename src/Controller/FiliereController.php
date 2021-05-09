<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FiliereController extends AbstractController
{
    /**
     * @Route("/admin/filiere", name="filiere")
     */
    public function filiere(): Response
    {
        return $this->render("back/filiere/filiere.html.twig");
    }
    /**
     * @Route("/admin/filiere/show", name="show_filiere")
     */
    public function show_filiere(): Response
    {
        return $this->render("back/filiere/show_filiere.html.twig");
    }
}
