<?php

namespace App\Controller;

use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailsnewsController extends AbstractController
{
    #[Route('/detailsnews/{newsId}', name: 'app_detailsnews')]
    public function index($newsId, NewsRepository $newsRepository): Response
    {
        $newsItem = $newsRepository->find($newsId);

        return $this->render('detailsnews/detailsnews.html.twig', [
            'newsItem' => $newsItem,
        ]);
    }
}
