<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArmeTypeStatistiqueRepository;

class ApiCustomArmeTypeStatistiqueController extends AbstractController
{
    /**
     * @Route("/api/custom/arme/type/statistique", name="api_custom_arme_type_statistique")
     */
    public function index(): Response
    {
        return $this->render('api_custom_arme_type_statistique/index.html.twig', [
            'controller_name' => 'ApiCustomArmeTypeStatistiqueController',
        ]);
    }
    
    /**
     * @Route("/api/custom/arme/type/statistique/raffinement", name="api_custom_raffinement", methods="GET")
     */
    public function arme_raffinement(ArmeTypeStatistiqueRepository $armeTypeStatistique, SerializerInterface $serializer)
    {
        $raffinement = $armeTypeStatistique->getRaffinement();
        $json = $serializer->serialize($raffinement, 'json');
        return new JsonResponse($json, 200, [], true);
    }
}
