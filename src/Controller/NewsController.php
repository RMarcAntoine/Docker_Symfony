<?php

namespace App\Controller;

use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    #[Route('/news', name: 'app_news')]
    public function index(Request $request, NewsRepository $newsRepository): Response
    {
        $page = $request->query->getInt('page', 1);
        $pageSize = 8;

        $news = $newsRepository->findBy([], ['Date' => 'DESC'], $pageSize, ($page - 1) * $pageSize);

        return $this->render('news/news.html.twig', [
            'news' => $news,
            'page' => $page,
        ]);
    }

}

