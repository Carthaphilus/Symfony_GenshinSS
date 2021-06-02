<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use \App\Repository\ArtefactRepository;

class ApiCustomArtefactController extends AbstractController
{
    /**
     * @Route("/api/custom/artefact", name="api_custom_artefact")
     */
    public function index(): Response
    {
        return $this->render('api_custom_artefact/index.html.twig', [
            'controller_name' => 'ApiCustomArtefactController',
        ]);
    }
    
    /**
     * @Route("/api/custom/artefact", name="api_custom_artefact", methods="GET")
     */
    public function getartefact(ArtefactRepository $artefactRepository, SerializerInterface $serializer)
    {
        $artefact = $artefactRepository->getArtefact();
        $json = $serializer->serialize($artefact, 'json');
        return new JsonResponse($json, 200, [], true);
    }
    
    /**
     * @Route("/api/custom/artefact/{id}/{label}", name="api_custom_artefact_2", methods="GET")
     */
    public function getartefact2(int $id, string $label, ArtefactRepository $artefactRepository, SerializerInterface $serializer)
    {
        $artefact = $artefactRepository->getArtefact2($id, $label);
        $json = $serializer->serialize($artefact, 'json');
        return new JsonResponse($json, 200, [], true);
    }
}
