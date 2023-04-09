<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\UnavailablesRepository;
use App\Repository\VehiculesRepository;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/unvailable')]
class UnavailableController extends AbstractController
{
    #[Route('/find/{id_v}/{nb_week}', name: 'findByWeekVehUnavailable', defaults:['nb_week' => null])]
    public function findByWeekVeh(UnavailablesRepository $unavailableRepository, int $nb_week = null, int $id_v, VehiculesRepository $vehiculesRepository): Response
    {
        if (is_null($nb_week)) {
            $date = new \DateTime(date('d-m-y h:i:s'));
            $nb_week =  intval($date->format('W'));
        }
        $resas = $unavailableRepository->findByWeekVehUnavailable($id_v, $nb_week);

        return $this->render('unavailable/index.html.twig', [
            'controller_name' => 'UnavailableController',
            'resas' => $resas
        ]);
    }
}
