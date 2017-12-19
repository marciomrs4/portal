<?php

namespace Portal\Bundle\Controller;

use Portal\Bundle\Entity\Permissoes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Permisso controller.
 *
 * @Route("permissoes")
 */
class PermissoesController extends Controller
{
    /**
     * Lists all permisso entities.
     *
     * @Route("/", name="permissoes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $permissoes = $em->getRepository('PortalBundle:Permissoes')->getAllPermissoes();

        //dump($permissoes); exit();

        return $this->render('PortalBundle:Permissoes:index.html.twig', array(
            'permissoes' => $permissoes,
        ));
    }

    /**
     * Finds and displays a permisso entity.
     *
     * @Route("/{id}", name="permissoes_show")
     * @Method("GET")
     */
    public function showAction(Permissoes $permisso)
    {

        $em = $this->getDoctrine()->getManager();

        $usuariosPermissoes = $this->get('portal.usuario_permissao')
            ->findByPermisao($permisso->getId());

        $listaUsuarios = [];
        foreach($usuariosPermissoes as $usuarioPermissao){
            $listaUsuarios[] = $em->getRepository('PortalBundle:Usuario')
                                  ->findBy(['id' => $usuarioPermissao->usuarioid]);
        }

        $gruposPermissoes = $this->get('portal.permissoes_grupo')
                                 ->findByPermisao($permisso->getId());


        $listaGrupos = [];
        foreach($gruposPermissoes as $grupoPermissao){
            $listaGrupos[] = $em->getRepository('PortalBundle:GrupoUsuarios')
                                ->findBy(['id' => $grupoPermissao->grupousuarioid]);
        }

        //dump($listaGrupos);
        //dump($listaUsuarios); exit();

        return $this->render('permissoes/show.html.twig', array(
            'permisso' => $permisso,
            'listaUsuarios' => $listaUsuarios,
            'listaGrupos' => $listaGrupos
        ));
    }


    /**
     * Finds and displays a permisso entity.
     *
     * @Route("/users/{id}", name="users_permissoes_show")
     * @Method("GET")
     */
    public function allUsersAction(Permissoes $permisso)
    {

        $em = $this->getDoctrine()->getManager();

        $usuariosPermissoes = $this->get('portal.usuario_permissao')
            ->findByPermisao($permisso->getId());

        $listaUsuarios = [];
        foreach($usuariosPermissoes as $usuarioPermissao){
            $listaUsuarios[] = $em->getRepository('PortalBundle:Usuario')
                ->find($usuarioPermissao->usuarioid);
        }

        $gruposPermissoes = $this->get('portal.permissoes_grupo')
            ->findByPermisao($permisso->getId());



        $listaPermissoesGrupos = [];
        foreach($gruposPermissoes as $grupoPermissao){
            $listaPermissoesGrupos[] = $this->get('portal.grupo_usuario')
                    ->findByGrupo($grupoPermissao->grupousuarioid);
        }


        foreach($listaPermissoesGrupos as $grupos){

            foreach($grupos as $item) {
                $listaUsuarios[] = $em->getRepository('PortalBundle:Usuario')
                    ->find($item->usuarioid);
            }
        }


        $listaId = [];
        foreach($listaUsuarios as $usuario){
            $listaId[] = $usuario->getId();
        }

       $listaUsuarios = array_unique($listaId);


        $listaUsuariosFinal = [];
        foreach($listaUsuarios as $id){
            $listaUsuariosFinal[] = $em->getRepository('PortalBundle:Usuario')
                ->find($id);
        }

        return $this->render(':permissoes:users_roles.html.twig', array(
            'listaUsuarios' => $listaUsuariosFinal
        ));
    }


}
