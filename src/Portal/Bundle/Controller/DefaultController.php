<?php

namespace Portal\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PortalBundle:Default:index.html.twig');
    }

    public function horarioCorteAction()
    {

        $horarios = $this->get('portal.horarios')
                         ->getAllHorarioCorte();

        return $this->render('PortalBundle:Default:horariocorte.html.twig',
                            array('horarios' => $horarios));

    }

    public function horarioCorteJsonAction()
    {

        $horarios = $this->get('portal.horarios')
                         ->getAllHorarioCorte();

        return new JsonResponse($horarios);

    }


}
