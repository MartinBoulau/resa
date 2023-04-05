<?php

namespace App\Controller;

use App\Entity\Reservations;
use App\Entity\Vehicules;
use App\Repository\PersonsRepository;
use App\Repository\ReservationsRepository;
use App\Repository\VehiculesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reservation')]
class ReservationController extends AbstractController
{
    #[Route('/find/{id_v}/{nb_week}', name: 'findByWeekVehReservation', defaults:['nb_week' => null])]
    public function findByWeekVeh(ReservationsRepository $reservationsRepository, int $nb_week = null, int $id_v, VehiculesRepository $vehiculesRepository, PersonsRepository $personsRepository): Response
    {
        if (is_null($nb_week)) {
            $date = new \DateTime(date('d-m-y h:i:s'));
            $nb_week =  intval($date->format('W'));
        }
        $resas = $reservationsRepository->findByWeekVehReservation($id_v, $nb_week);

        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
            'resas' => $resas
        ]);
    }

    #[Route('/add', name:'addResa')]
    public function addResa(ReservationsRepository $reservationsRepository, VehiculesRepository $vehiculesRepository, PersonsRepository $personsRepository, Request $request): Response
    {
        // /reservation/add?datestart=2023-04-05%2012:00:00&dateend=2023-04-06%2012:00:00&nbweek=14&idv=1&idp=1&idpr=1

        $dateStart=new \DateTime($request->query->get('datestart'));
        $dateEnd=new \DateTime($request->query->get('dateend'));
        $nbWeek=$request->query->get('nbweek');
        $idV=$vehiculesRepository->find($request->query->get('idv'));
        $idP=$personsRepository->find($request->query->get('idp'));
        $idPr=$personsRepository->find($request->query->get('idpr'));
        
        // dd($dateStart);

        $resa = new Reservations();
        // $idV = $vehiculesRepository->find($idV);

        $resa->setDateStart($dateStart);
        $resa->setDateEnd($dateEnd);
        $resa->setNbWeek($nbWeek);
        $resa->setVehicule($idV);
        $resa->setPerson($idP);
        $resa->setPersonResa($idPr);

        $response = false;
        if ($reservationsRepository->save($resa, true))
        {
            $response = true;
        }
        

        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
            'response' => $response
        ]);
    }
}
