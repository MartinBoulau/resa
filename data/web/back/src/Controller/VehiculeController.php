<?php

namespace App\Controller;

use App\Repository\VehiculesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/vehicule')]
class VehiculeController extends AbstractController
{
    #[Route('/all', name: 'allVehicule')]
    public function index(VehiculesRepository $vehiculesRepository): Response
    {
        $vehicules = $vehiculesRepository->findAll();

        return $this->render('vehicule/index.html.twig', [
            'controller_name' => 'VehiculeController',
            'vehicules' => $vehicules
        ]);
    }
}
