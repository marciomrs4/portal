<?php

namespace Portal\Bundle\Controller;

use Portal\Bundle\Entity\UsuarioPermissao;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Portal\Bundle\Entity\Usuario;

/**
 * Usuariopermissao controller.
 *
 * @Route("usuariopermissao")
 */
class UsuarioPermissaoController extends Controller
{
    /**
     * Lists all usuarioPermissao entities.
     *
     * @Route("/{usuario}", name="usuariopermissao_index")
     * @Method("GET")
     */
    public function indexAction(Usuario $usuario)
    {

        $usuarioPermissaos  = $this->get('portal.usuario_permissao')
                                   ->listarTodos();

        return $this->render('usuariopermissao/index.html.twig', array(
            'usuarioPermissaos' => $usuarioPermissaos,
        ));
    }

    /**
     * Finds and displays a usuarioPermissao entity.
     *
     * @Route("/show/{usuario}", name="usuariopermissao_show")
     * @Method("GET")
     */
    public function showAction($usuario)
    {

        $usuarioPermissao = $this->get('portal.usuario_permissao')
                                 ->findByUsuario($usuario);

        return $this->render('usuariopermissao/show.html.twig', array(
            'usuarioPermissao' => $usuarioPermissao,
        ));
    }
}
