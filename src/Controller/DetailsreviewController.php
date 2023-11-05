<?php

namespace App\Controller;

use App\Repository\ReviewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailsreviewController extends AbstractController
{
    #[Route('/detailsreviews/{reviewsItem}', name: 'app_detailsreviews')]
    public function index($reviewsItem, ReviewsRepository $reviewsRepository): Response
    {
        $review = $reviewsRepository->find($reviewsItem);
    
        if (!$review) {
            throw $this->createNotFoundException('Review not found');
        }
    
        return $this->render('detailsreviews/detailsreviews.html.twig', [
            'reviewsItem' => $review,
        ]);
    }    
}
