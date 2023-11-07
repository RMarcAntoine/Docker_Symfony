<?php

namespace App\Controller;

use App\Repository\ReviewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReviewController extends AbstractController
{
    #[Route('/review', name: 'app_review')]
    public function index(Request $request, ReviewsRepository $reviewsRepository): Response
    {
        $page = $request->query->getInt('page', 1);
        $pageSize = 6;

        $topRatedReviews = $reviewsRepository->findBy([], ['Rate' => 'DESC'], 4);

        $offset = ($page - 1) * $pageSize;
        $reviews = $reviewsRepository->findBy([], ['Rate' => 'DESC'], $pageSize, $offset);

        return $this->render('review/review.html.twig', [
            'reviews' => $reviews,
            'topRatedReviews' => $topRatedReviews,
            'currentPage' => $page,
        ]);
    }
}