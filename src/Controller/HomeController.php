<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Company;
use App\Entity\Message;
use App\Entity\Review;
use App\Entity\User;
use App\Form\MessageType;
use App\Form\ReviewType;
use App\Service\CarUtils;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homePage(Request $request, EntityManagerInterface $entityManager, CarUtils $carUtils): Response
    {
        /** @var Company $company */
        $company = $entityManager->getRepository(Company::class)->findOneBy(['email' => 'contact@vparrot.com']);

        $message = new Message();
        $message->setCompany($company);
        $formMessage = $this->createForm(MessageType::class, $message);
        $formMessage->handleRequest($request);

        $review = new Review();
        $review->setCompany($company);
        $review->setUser($this->getUser());
        $formReview = $this->createForm(ReviewType::class, $review);
        $formReview->handleRequest($request);

        if ($formReview->isSubmitted() && $formReview->isValid()) {
            $entityManager->persist($review);
            $entityManager->flush();
            return $this->redirectToRoute('app_homepage');
        }

        if ($formMessage->isSubmitted() && $formMessage->isValid()) {
            $entityManager->persist($message);
            $entityManager->flush();
            return $this->redirectToRoute('app_homepage');
        }

        // On filtre les filtres vides dans le HTTP Query
        $filterQuery = $request->query->all() ? array_filter($request->query->all()['filter']) : null;
        if ($filterQuery) {
            $cars = $carUtils->filter($filterQuery);
        } else {
            $cars = $entityManager->getRepository(Car::class)->findAll();
        }

        $reviews = $entityManager->getRepository(Review::class)->findBy(['isPublished'=>true]);

        return $this->render('homepage/index.html.twig', [
            'messageForm' => $formMessage->createView(),
            'cars' => $cars,
            'reviewForm' => $formReview->createView(),
            'reviews' => $reviews,
        ]);
    }

    /**
     * @Route("/like/{id}", methods={"POST"}, name="app_like")
     */
    public function like(Car $car): JsonResponse
    {
        return $this->json(["aze" => "aze"]);
    }
}