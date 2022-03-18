<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccesoController extends AbstractController
{
    /**
     * @Route("/acceso", name="app_acceso")
     */
    public function index(): Response
    {
        return $this->render('acceso/index.html.twig', [
            'controller_name' => 'AccesoController',
        ]);
    }
}
