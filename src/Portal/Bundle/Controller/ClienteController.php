<?php

namespace Portal\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;

class ClienteController extends Controller
{
    /**
     * @Route("/clientes")
     * @Method("GET")
     */
    public function listParametersAction()
    {
        $clientes = $this->get('portal.clientes')
            ->getAllClienteParameters();

        return $this->render('PortalBundle:Cliente:list_parameters.html.twig', array(
            'clientes' => $clientes
        ));
    }

    /**
     * @Route("/clientes/json")
     * @Method("GET")
     */
    public function listParametersJsonAction()
    {
        $clientes = $this->get('portal.clientes')
                         ->getAllClienteParameters();

        return new JsonResponse($clientes);
    }

}
