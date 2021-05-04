<?php

namespace App\Controller;

use App\Repository\PersonnageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class ApiCustomPersonnageController extends AbstractController
{
    /**
     * @Route("/api/custom/personnage", name="api_custom_personnage", methods="GET")
     */
    public function index(PersonnageRepository $personnageRepository, SerializerInterface $serializer)
    {
        $personnage = $personnageRepository->findAll();
        $json = $serializer->serialize($personnage, 'json', [
            'groups' => 'personnage:read'
        ]);
        return new JsonResponse($json, 200, [], true);
    }
}
