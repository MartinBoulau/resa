<?php

namespace App\Controller;

use App\Repository\PersonsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/person')]
class PersonController extends AbstractController
{
    #[Route('/all', name: 'allPerson')]
    public function index(PersonsRepository $personsRepository): Response
    {
        $persons = $personsRepository->findAll();

        return $this->render('person/index.html.twig', [
            'controller_name' => 'PersonController',
            'persons' => $persons
        ]);
    }
}
