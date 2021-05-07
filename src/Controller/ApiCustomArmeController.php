<?php

namespace App\Controller;

use App\Repository\ArmeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ApiCustomArmeController extends AbstractController
{
    /**
     * @Route("/api/custom/arme", name="api_custom_arme")
     */
    public function index(): Response
    {
        return $this->render('api_custom_arme/index.html.twig', [
            'controller_name' => 'ApiCustomArmeController',
        ]);
    }
    
    /**
     * @Route("/api/custom/arme_personnage/{id}", name="api_custom_arme_personnage", methods="GET")
     */
    public function arme_personnage(int $id, ArmeRepository $armeRepository, SerializerInterface $serializer)
    {
        $armes = $armeRepository->getArmeByPersonnage($id);
        $json = $serializer->serialize($armes, 'json');
        return new JsonResponse($json, 200, [], true);
    }
}
