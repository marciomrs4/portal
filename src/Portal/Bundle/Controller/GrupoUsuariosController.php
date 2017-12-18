<?php

namespace Portal\Bundle\Controller;

use Portal\Bundle\Entity\GrupoUsuarios;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Grupousuario controller.
 *
 * @Route("grupousuarios")
 */
class GrupoUsuariosController extends Controller
{
    /**
     * Lists all grupoUsuario entities.
     *
     * @Route("/", name="grupousuarios_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $grupoUsuarios = $em->getRepository('PortalBundle:GrupoUsuarios')
                            ->findAll();

        return $this->render('grupousuarios/index.html.twig', array(
            'grupoUsuarios' => $grupoUsuarios,
        ));
    }

    /**
     * Finds and displays a grupoUsuario entity.
     *
     * @Route("/{id}", name="grupousuarios_show")
     * @Method("GET")
     */
    public function showAction(GrupoUsuarios $grupoUsuario)
    {

        $em = $this->getDoctrine()->getManager();

        $listaUsuarios = $this->get('portal.grupo_usuario')
                              ->findByGrupo($grupoUsuario->getId());

        $usuariosEncontrados = [];
        foreach($listaUsuarios as $usuario){

                $usuariosEncontrados[] = $em->getRepository('PortalBundle:Usuario')
                                          ->findOneBy(array('id' => $usuario->usuarioid));

        }

        $subGrupos = $this->get('portal.sub_grupo')
                          ->findByGrupoFilho($grupoUsuario->getId());


        return $this->render('grupousuarios/show.html.twig', array(
            'grupoUsuario' => $grupoUsuario,
            'usuarios' => $usuariosEncontrados,
            'subgrupos' => $subGrupos
        ));
    }
}
