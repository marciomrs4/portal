<?php

namespace Portal\Bundle\Controller;

use Portal\Bundle\Entity\RelatorioDinamico;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Relatoriodinamico controller.
 *
 * @Route("relatoriodinamico")
 */
class RelatorioDinamicoController extends Controller
{
    /**
     * Lists all relatorioDinamico entities.
     *
     * @Route("/", name="relatoriodinamico_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $relatorioDinamicos = $em->getRepository('PortalBundle:RelatorioDinamico')->findAll();

        return $this->render('relatoriodinamico/index.html.twig', array(
            'relatorioDinamicos' => $relatorioDinamicos,
        ));
    }

    /**
     * Finds and displays a relatorioDinamico entity.
     *
     * @Route("/{id}", name="relatoriodinamico_show")
     * @Method("GET")
     */
    public function showAction(RelatorioDinamico $relatorioDinamico)
    {

        $permissao = $this->getDoctrine()
                          ->getRepository('PortalBundle:Permissoes')
                          ->findBy(['nome' => $relatorioDinamico->getPermissao()]);

        //dump($permissao); exit();


        return $this->render('relatoriodinamico/show.html.twig', array(
            'relatorioDinamico' => $relatorioDinamico,
            'permissao' => $permissao
        ));
    }
}
