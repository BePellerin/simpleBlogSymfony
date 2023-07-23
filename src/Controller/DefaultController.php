<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;

class DefaultController extends AbstractController
{
    //Route qui va lister nos articles

    #[Route('/', name: 'liste_articles')]
    public function listeArticles(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();
        return $this->render('default/index.html.twig', [
            'articles' => $articles
        ]);
        
    }



    //Route pour afficher un article
    #[Route('/{id}', name: 'vue_article', requirements: ["id" => "\d+"])]
    public function vueArticle(ArticleRepository $articleRepository, $id): Response
    {
        $article = $articleRepository->find($id);
        return $this->render('default/vue.html.twig', [
            'article' => $article,
        ]);
    }



    //Route pour la création d'article
    #[Route('/article/ajouter', name: 'ajout_article')]
    public function ajoutArticle(EntityManagerInterface $manager)
    {
        $article = new Article();
        $article->setTitle("Titre de l'article");
        $article->setContenu("Contenu de l'article");
        $article->setDateCreate(new \DateTime());

        $manager->persist($article);

        $manager->flush();

        die;
        // return $this->render('default/vue.html.twig', [
        //     'idNumber' => $id,
        // ]);
    }
}
