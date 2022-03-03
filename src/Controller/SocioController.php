<?php

namespace App\Controller;

use App\Repository\AccesoRepository;
use App\Repository\SocioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SocioController extends AbstractController
{
    /**
     * @Route("/socio/listar", name="socio_listar")
     */
    public function listarSocios(SocioRepository $sociosRepository): Response
    {
        $socios = $sociosRepository->findBy([],['apellidos' => 'ASC']);

        return $this->render('Socio/listarSocios.html.twig', [
            'socios' => $socios
        ]);
    }

    /**
     * @Route("/socio/accesos/{id}", name="socio_accesos")
     */
    public function socioAccesos(AccesoRepository $accesoRepository, int $id): Response
    {
        $accesos = $accesoRepository->findSocioAccesos($id);

        return $this->render('Socio/accesosSocio.html.twig', [
            'accesos' => $accesos
        ]);
    }
}