<?php

namespace App\Controller;

use App\Entity\Empleado;
use App\Form\EmpleadoType;
use App\Repository\EmpleadoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class EmpleadoController extends AbstractController
{
    /**
     * @Route("/empleado/listar", name="empleado_listar")
     * @Security("is_granted('ROLE_EMPLEADO')")
     */
    public function listarEmpleado(EmpleadoRepository $empleadoRepository): Response
    {
        $empleado = $empleadoRepository->findBy([],['nombre' => 'ASC']);

        return $this->render('empleado/index.html.twig', [
            'empleados' => $empleado
        ]);
    }

    /**
     * @Route("/empleado/nuevo", name="empleado_nuevo")
     * @Security("is_granted('ROLE_SUPERVISOR')")
     */
    public function nuevo(Request $request, EmpleadoRepository $empleadoRepository): Response
    {
        $empleado = $empleadoRepository->create();

        return $this->modificar($request, $empleadoRepository, $empleado);
    }

    /**
     * @Route("/empleado/modificar/{id}", name="empleado_modificar")
     * @Security("is_granted('ROLE_SUPERVISOR')")
     */
    public function modificar(Request $request, EmpleadoRepository $empleadoRepository, Empleado $empleado): Response
    {
        $form = $this->createForm(EmpleadoType::class, $empleado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $empleadoRepository->save();
                $this->addFlash('exito', 'Cambios guardados con éxito');
                return $this->redirectToRoute('empleado_listar');
            } catch (\Exception $exception) {
                $this->addFlash('error', 'Error al guardar los cambios');
            }
        }
        return $this->render('empleado/modificar.html.twig', [
            'empleado' => $empleado,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/empleado/eliminar/{id}", name="empleado_eliminar")
     * @Security("is_granted('ROLE_SUPERVISOR')")
     */
    public function eliminar(Request $request, EmpleadoRepository $empleadoRepository, Empleado $empleado): Response
    {
        if ($request->get('confirmar', false)) {
            try {
                $empleadoRepository->delete($empleado);
                $this->addFlash('exito', 'Empleado eliminado con éxito');
                return $this->redirectToRoute('empleado_listar');
            } catch (\Exception $exception) {
                $this->addFlash('error', 'No se pudo eliminar este empleado');
            }
        }
        return $this->render('empleado/eliminar.html.twig', [
            'empleado' => $empleado
        ]);
    }

}
