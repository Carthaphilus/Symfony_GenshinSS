<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArtefactStatEffetRepository;
use Symfony\Component\Serializer\SerializerInterface;

class ApiCustomArtefactStatEffetController extends AbstractController
{
    /**
     * @Route("/api/custom/artefact/stat/effet", name="api_custom_artefact_stat_effet")
     */
    public function index(): Response
    {
        return $this->render('api_custom_artefact_stat_effet/index.html.twig', [
            'controller_name' => 'ApiCustomArtefactStatEffetController',
        ]);
    }
    
    /**
     * @Route("/api/custom/artefact/stat/effet/{id}", name="api_custom_artefact_stat_effet_type_stat", methods="GET")
     */
    public function getartefactstateffet(int $id,ArtefactStatEffetRepository $artefactstateffetRepository, SerializerInterface $serializer)
    {
        $artefactStatEffet = $artefactstateffetRepository->getArtefactStatEffet($id);
        $json = $serializer->serialize($artefactStatEffet, 'json');
        return new JsonResponse($json, 200, [], true);
    }
}
