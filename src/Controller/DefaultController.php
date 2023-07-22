<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    //Route qui va lister nos articles

    #[Route('/', name: 'liste_articles')]
    public function listeArticles(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'Bebere',
        ]);
    }

    //Route pour afficher un article
    #[Route('/{id}', name: 'vue_article', requirements:["id"=>"\d+"])]
    public function vueArticle($id): Response
    {
        return $this->render('default/vue.html.twig', [
            'idNumber' => $id,
        ]);
    }
}
