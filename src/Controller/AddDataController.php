<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ArmeType;
use App\Entity\Arme;
use App\Entity\Element;
use App\Entity\Personnage;
use App\Entity\TypeCompetence;
use App\Entity\Competence;
use App\Entity\Niveau;
use App\Entity\PersonnageNiveau;
use App\Entity\ArmeNiveau;
use App\Entity\TypeStatistique;
use App\Entity\ArmeTypeStatistique;

class AddDataController extends AbstractController
{
    /**
     * @Route("/add/data", name="add_data")
     */
    public function index(): Response
    {
        $file = 'data.min.json';
        $data = file_get_contents($file); 
        $obj = json_decode($data); 
        $array = json_decode(json_encode($obj), true);
        //dump($array['French']['talents']);
        $frenchData = $array['French'];
        $entityManager = $this->getDoctrine()->getManager();

        $armeType = ['Épée à une main','Lance','Catalyseur','Arc','Épée à deux mains'];
        $elements = ['Hydro','Géo','Pyro','Électro','Cryo','Anémo','Aucun'];
        $typesCompetence = ['Attaque normale','Compétence élémentaire','Déchainement élémentaire'];
        $competences = [
            array('Fischl', 1, 'DGT 1er coup', 1, 44.1),
            array('Fischl', 1, 'DGT 2e coup', 1, 46.8),
            array('Fischl', 1, 'DGT 3e coup', 1, 58.1),
            array('Fischl', 1, 'DGT 4e coup', 1, 57.7),
            array('Fischl', 1, 'DGT 5e coup', 1, 72.1),
            array('Fischl', 1, 'DGT Tir visé', 1, 43.9),
            array('Fischl', 1, 'DGT Tir visé (Pleine charge)', 1, 124),
            array('Fischl', 1, 'DGT durant la chute', 1, 56.8),
            array('Fischl', 1, 'DGT Chute basse', 1, 114),
            array('Fischl', 1, 'DGT Chute élevée', 1, 142),
            array('Fischl', 2, 'DGT d\'Oz', 1, 88.8),
            array('Fischl', 2, 'DGT Invocation', 1, 115),
            array('Fischl', 3, 'DGT Foudre', 1, 208),
            array('Fischl', 1, 'DGT 1er coup', 2, 47.7),
            array('Fischl', 1, 'DGT 2e coup', 2, 50.6),
            array('Fischl', 1, 'DGT 3e coup', 2, 62.9),
            array('Fischl', 1, 'DGT 4e coup', 2, 62.4),
            array('Fischl', 1, 'DGT 5e coup', 2, 77.9),
            array('Fischl', 1, 'DGT Tir visé', 2, 47.4),
            array('Fischl', 1, 'DGT Tir visé (Pleine charge)', 2, 133),
            array('Fischl', 1, 'DGT durant la chute', 2, 61.5),
            array('Fischl', 1, 'DGT Chute basse', 2, 123),
            array('Fischl', 1, 'DGT Chute élevée', 2, 153),
            array('Fischl', 2, 'DGT d\'Oz', 2, 95.5),
            array('Fischl', 2, 'DGT Invocation', 2, 124),
            array('Fischl', 3, 'DGT Foudre', 2, 224),
            array('Diluc', 1, 'DGT 1er coup', 1, 89.7),
            array('Diluc', 1, 'DGT 2e coup', 1, 87.6),
            array('Diluc', 1, 'DGT 3e coup', 1, 98.8),
            array('Diluc', 1, 'DGT 4e coup', 1, 134),
            array('Diluc', 1, 'DGT Attaque chargée circulaire', 1, 68.8),
            array('Diluc', 1, 'DGT Attaque chargée finale', 1, 125),
            array('Diluc', 1, 'DGT durant la chute', 1, 89.5),
            array('Diluc', 1, 'DGT Chute basse', 1, 179),
            array('Diluc', 1, 'DGT Chute élevée', 1, 224),
            array('Diluc', 1, 'DGT 1er coup', 2, 97),
            array('Diluc', 1, 'DGT 2e coup', 2, 94.8),
            array('Diluc', 1, 'DGT 3e coup', 2, 107),
            array('Diluc', 1, 'DGT 4e coup', 2, 145),
            array('Diluc', 1, 'DGT Attaque chargée circulaire', 2, 74.4),
            array('Diluc', 1, 'DGT Attaque chargée finale', 2, 135),
            array('Diluc', 1, 'DGT durant la chute', 2, 96.8),
            array('Diluc', 1, 'DGT Chute basse', 2, 194),
            array('Diluc', 1, 'DGT Chute élevée', 2, 242),
            array('Diluc', 1, 'DGT Attaque normale', 1, 28),
            array('Ningguang', 1, 'DGT Attaque chargée', 1, 174),
            array('Ningguang', 1, 'DGT par jade d\'étoile', 1, 49.6),
            array('Ningguang', 1, 'DGT durant la chute', 1, 56.8),
            array('Ningguang', 1, 'DGT Chute basse', 1, 114),
            array('Ningguang', 1, 'DGT Chute élevée', 1, 142),
            array('Ningguang', 1, 'DGT Attaque normale', 2, 30.1),
            array('Ningguang', 1, 'DGT Attaque chargée', 2, 187),
            array('Ningguang', 1, 'DGT par jade d\'étoile', 2, 53.3),
            array('Ningguang', 1, 'DGT durant la chute', 2, 61.5),
            array('Ningguang', 1, 'DGT Chute basse', 2, 123),
            array('Ningguang', 1, 'DGT Chute élevée', 2, 153)
        ];
        $niveaux = [1,20,40,50,60,70,80,90];
        $personnagesNiveaux = [
            array(11, 1, 21, 770, 50, '-'),
            array(11, 2, 53, 1979, 128, '-'),
            array(8, 1, 26, 1, 61, '-'),
            array(8, 2, 90, 3488, 211, '-'),
            array(21, 1, 18, 821, 48, '-'),
            array(21, 2, 59, 2721, 159, '-')
        ];
        $armesNiveaux = [
            array(68, 1, 42, '9% ATK'),
            array(68, 2, 135, '15.9% ATK'),
            array(31, 1, 41, '13.3% Recharge d\'énergie'),
            array(31, 2, 125, '23.6% Recharge d\'énergie'),
            array(55, 1, 44, '6% ATK'),
            array(55, 2, 144, '10.6% ATK'),
            array(110, 1, 46, '10.8% ATK'),
            array(110, 2, 153, '19.1% ATK'),
            array(65, 1, 44, '6% ATK'),
            array(65, 2, 144, '10.6% ATK'),
            array(79, 1, 48, '7.2% ATK'),
            array(79, 2, 164, '12.7% ATK')
        ];
        $typeStat = [
            'Attaque',
            'Attaque %',
            'Défense',
            'Défense %',
            'Hp',
            'Hp %',
            '% Taux critique',
            '% Dégâts critique',
            'Maîtrise élémentaire',
            '% Recharge d\'énergie',
            '% Dégâts physiques',
            '% Dégâts élémentaires',
            '% Dégâts attaque normal',
            '% Dégâts attaque chargé',
            'Energie élémentaire',
            '% Dégâts additionnels'
        ];
        $armeTypeStat = [
            array(68,13,40,'R1'),
            array(68,14,-10,'R1'),
            array(68,13,50,'R2'),
            array(68,14,-10,'R2'),
            array(68,13,60,'R3'),
            array(68,14,-10,'R3'),
            array(68,13,70,'R4'),
            array(68,14,-10,'R4'),
            array(68,13,80,'R5'),
            array(68,14,-10,'R5'),
            array(31,15,6,'R1'),
            array(31,15,6,'R2'),
            array(31,15,6,'R3'),
            array(31,15,6,'R4'),
            array(31,15,6,'R5'),
            array(55,16,240,'R1'),
            array(55,16,300,'R2'),
            array(55,16,360,'R3'),
            array(55,16,420,'R4'),
            array(55,16,480,'R5'),
            array(110,2,60,'R1'),
            array(110,2,75,'R2'),
            array(110,2,90,'R3'),
            array(110,2,105,'R4'),
            array(110,2,120,'R5'),
            array(79,12,12,'R1'),
            array(79,16,160,'R1'),
            array(79,12,15,'R2'),
            array(79,16,200,'R2'),
            array(79,12,18,'R3'),
            array(79,16,240,'R3'),
            array(79,12,21,'R4'),
            array(79,16,280,'R4'),
            array(79,12,24,'R5'),
            array(79,16,320,'R5'),
            array(65,6,8,'R1'),
            array(65,6,10,'R2'),
            array(65,6,12,'R3'),
            array(65,6,14,'R4'),
            array(65,6,16,'R5'),
        ];


        $armeTypeRepository = $this->getDoctrine()->getRepository('App:ArmeType');
        $dbArmeTypes = $armeTypeRepository->findAll();

        if (!$dbArmeTypes) {
            foreach($armeType as $type){
                //dump($type);
                $armeTypeObject = new ArmeType();
                $armeTypeObject->setLabelType($type);
                $entityManager->persist($armeTypeObject);
                $entityManager->flush();
            }
        }

        $elementRepository = $this->getDoctrine()->getRepository('App:Element');
        $dbElement = $elementRepository->findAll();

        if (!$dbElement) {
            foreach($elements as $element){
                //dump($type);
                $elementObject = new Element();
                $elementObject->setLabel($element);
                $entityManager->persist($elementObject);
                $entityManager->flush();
            }
        }

        $armeRepository = $this->getDoctrine()->getRepository('App:Arme');
        $dbArme = $armeRepository->findAll();
        //dump($frenchData['weapons']);

        if (!$dbArme) {
            foreach($frenchData['weapons'] as $arme){
                $dbArmeType = $armeTypeRepository->findBy(['labelType' => ($arme['weapontype'] == 'Arme d\'hast' ? 'Lance' : $arme['weapontype'])]);
                //dump($dbArmeType);
                $armeObject = new Arme();
                $armeObject->setNomArme($arme['name']);
                $armeObject->setRarete($arme['rarity']);
                $armeObject->setArmeType(isset($dbArmeType[0]) ? $dbArmeType[0] : null);
                $entityManager->persist($armeObject);
                $entityManager->flush();
            }
        }

        $personnageRepository = $this->getDoctrine()->getRepository('App:Personnage');
        $dbPersonnages = $personnageRepository->findAll();
        //dump($frenchData['weapons']);

        if (!$dbPersonnages) {
            foreach($frenchData['characters'] as $personnage){
                $dbArmeType = $armeTypeRepository->findBy(['labelType' => ($personnage['weapontype'] == 'Arme d\'hast' ? 'Lance' : $personnage['weapontype'])]);
                $dbElement = $elementRepository->findBy(['label' => $personnage['element']]);
                //dump($dbArmeType);
                $personnageObject = new Personnage();
                $personnageObject->setNom($personnage['name']);
                $personnageObject->setRarete($personnage['rarity']);
                $personnageObject->setArmeType($dbArmeType[0]);
                $personnageObject->setElement($dbElement[0]);
                $personnageObject->setImage('Character_'.$personnage['name'].'_Thumb.jpeg');
                $entityManager->persist($personnageObject);
                $entityManager->flush();
            }
        }

        $typeCompetenceRepository = $this->getDoctrine()->getRepository('App:TypeCompetence');
        $dbTypeCompetence = $typeCompetenceRepository->findAll();

        if (!$dbTypeCompetence) {
            foreach($typesCompetence as $type){
                //dump($type);
                $typeCompetenceObject = new TypeCompetence();
                $typeCompetenceObject->setTypeCompetenceLabel($type);
                $entityManager->persist($typeCompetenceObject);
                $entityManager->flush();
            }
        }

        $competenceRepository = $this->getDoctrine()->getRepository('App:Competence');
        $dbCompetences = $competenceRepository->findAll();
        //dump($frenchData['weapons']);

        if (!$dbCompetences) {
            foreach($competences as $competence){
                $dbPersonnage = $personnageRepository->findBy(['nom' => $competence[0]]);
                $dbTypeCompetence = $typeCompetenceRepository->find($competence[1]);
                //dump($dbArmeType);
                $competenceObject = new Competence();
                $competenceObject->setPersonnageCompetenceLabel($competence[2]);
                $competenceObject->setAscension($competence[3]);
                $competenceObject->setPourcentageDegats($competence[4]);
                $competenceObject->setPersonnage($dbPersonnage[0]);
                $competenceObject->setTypeCompetence($dbTypeCompetence);
                $entityManager->persist($competenceObject);
                $entityManager->flush();
            }
        }

        $niveauRepository = $this->getDoctrine()->getRepository('App:Niveau');
        $dbNiveau = $niveauRepository->findAll();

        if (!$dbNiveau) {
            foreach($niveaux as $niveau){
                //dump($type);
                $niveauObject = new Niveau();
                $niveauObject->setNbNiveau($niveau);
                $entityManager->persist($niveauObject);
                $entityManager->flush();
            }
        }

        $personnagesNiveauxRepository = $this->getDoctrine()->getRepository('App:PersonnageNiveau');
        $dbPersonnagesNiveaux = $personnagesNiveauxRepository->findAll();
        //dump($frenchData['weapons']);

        if (!$dbPersonnagesNiveaux) {
            foreach($personnagesNiveaux as $personnageNiveau){
                $dbPersonnage = $personnageRepository->find($personnageNiveau[0]);
                $dbNiveau = $niveauRepository->find($personnageNiveau[1]);
                //dump($dbArmeType);
                $personnageNiveauObject = new PersonnageNiveau();
                $personnageNiveauObject->setPersonnage($dbPersonnage);
                $personnageNiveauObject->setNiveau($dbNiveau);
                $personnageNiveauObject->setAtk($personnageNiveau[2]);
                $personnageNiveauObject->setHp($personnageNiveau[3]);
                $personnageNiveauObject->setDef($personnageNiveau[4]);
                $personnageNiveauObject->setStatAscension($personnageNiveau[5]);
                $entityManager->persist($personnageNiveauObject);
                $entityManager->flush();
            }
        }

        $armesNiveauxRepository = $this->getDoctrine()->getRepository('App:ArmeNiveau');
        $dbArmesNiveaux = $armesNiveauxRepository->findAll();
        //dump($frenchData['weapons']);

        if (!$dbArmesNiveaux) {
            foreach($armesNiveaux as $armeNiveau){
                $dbArme = $armeRepository->find($armeNiveau[0]);
                $dbNiveau = $niveauRepository->find($armeNiveau[1]);
                //dump($dbArmeType);
                $armeNiveauObject = new ArmeNiveau();
                $armeNiveauObject->setArme($dbArme);
                $armeNiveauObject->setNiveau($dbNiveau);
                $armeNiveauObject->setAtk($armeNiveau[2]);
                $armeNiveauObject->setStatSecondaire($armeNiveau[3]);
                $entityManager->persist($armeNiveauObject);
                $entityManager->flush();
            }
        }

        $typeStatistiqueRepository = $this->getDoctrine()->getRepository('App:TypeStatistique');
        $dbTypeStatistique = $typeStatistiqueRepository->findAll();

        if (!$dbTypeStatistique) {
            foreach($typeStat as $type){
                //dump($type);
                $typeStatistiqueObject = new TypeStatistique();
                $typeStatistiqueObject->setLabelTypeStat($type);
                $entityManager->persist($typeStatistiqueObject);
                $entityManager->flush();
            }
        }

        $armeTypeStatistiqueRepository = $this->getDoctrine()->getRepository('App:ArmeTypeStatistique');
        $dbArmeTypeStatistique = $armeTypeStatistiqueRepository->findAll();
        //dump($frenchData['weapons']);

        if (!$dbArmeTypeStatistique) {
            foreach($armeTypeStat as $stat){
                $dbArme = $armeRepository->find($stat[0]);
                $dbTypeStatistique = $typeStatistiqueRepository->find($stat[1]);
                //dump($dbArmeType);
                $armeTypeStatistiqueObject = new ArmeTypeStatistique();
                $armeTypeStatistiqueObject->setArme($dbArme);
                $armeTypeStatistiqueObject->setTypeStatistique($dbTypeStatistique);
                $armeTypeStatistiqueObject->setValeurStat($stat[2]);
                $armeTypeStatistiqueObject->setRaffinement($stat[3]);
                $entityManager->persist($armeTypeStatistiqueObject);
                $entityManager->flush();
            }
        }

        return $this->render('add_data/index.html.twig', [
            'controller_name' => 'AddDataController',
        ]);
    }
}
