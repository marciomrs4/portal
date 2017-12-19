<?php

namespace Portal\Bundle\Controller;

use Portal\Bundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Usuario controller.
 *
 * @Route("usuario")
 */
class UsuarioController extends Controller
{
    /**
     * Lists all usuario entities.
     *
     * @Route("/", name="usuario_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $usuarios = $em->getRepository('PortalBundle:Usuario')->findAll();

        return $this->render('usuario/index.html.twig', array(
            'usuarios' => $usuarios,
        ));
    }

    /**
     * Lists all usuario entities to inative.
     *
     * @Route("/inative", name="usuario_toinative_index")
     * @Method("GET")
     */
    public function inativeAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dateFrom = new \DateTime('now');
        $dateFrom->modify('-60days');

        //dump($dateFrom); exit();

        $usuarios = $em->getRepository('PortalBundle:Usuario')
                       ->getAllActiveUsersFromAccessDate($dateFrom->format('Y-m-d'));

        //dump($usuarios); exit();

        return $this->render(':usuario:inative.html.twig', array(
            'usuarios' => $usuarios,
        ));
    }


    /**
     * Finds and displays a usuario entity.
     *
     * @Route("/{id}", name="usuario_show")
     * @Method("GET")
     */
    public function showAction(Usuario $usuario)
    {

        $em = $this->getDoctrine()->getManager();

        $usuariosPermissoes = $this->get('portal.usuario_permissao')
                                   ->findByUsuario($usuario->getId());

        $usuariosGrupos = $this->get('portal.grupo_usuario')
                               ->findByUsuario($usuario->getId());
        $grupos = [];
        foreach($usuariosGrupos as $grupo){
            $grupos[] = $em->getRepository('PortalBundle:GrupoUsuarios')
                           ->findBy(['id' => $grupo->grupousuarioid]);

        }



        $permissoesGrupoArray = [];
        foreach($grupos as $grupo){

            $permissoesGrupoArray[] = $this->get('portal.permissoes_grupo')
                                           ->findByGrupo($grupo[0]->getId());

        }


        foreach($permissoesGrupoArray as $permissoesGrupo){


            foreach ($permissoesGrupo as $item) {

                $permissao = $em->getRepository('PortalBundle:Permissoes')
                                ->find($item->papelid);

                $grupo = $em->getRepository('PortalBundle:GrupoUsuarios')
                            ->find($item->grupousuarioid);

            }

        }

        $permissoes = [];
        foreach($usuariosPermissoes as $permissao) {

            $permissoes[] = $em->getRepository('PortalBundle:Permissoes')
                               ->findBy(array('id' => $permissao['papelid']));
        }


        return $this->render('usuario/show.html.twig', array(
            'usuario' => $usuario,
            'permissoes_usuario' => $permissoes,
            'grupos' => $grupos
        ));
    }

    /**
     * Lists all usuario roles.
     *
     * @Route("/roles/show/{usuario}", name="usuario_unique_roles")
     * @Method("GET")
     */
    public function uniqueRolesAction(Usuario $usuario)
    {
        $em = $this->getDoctrine()->getManager();


        $permissoesUsuario = $this->get('portal.usuario_permissao')
                                  ->findByUsuario($usuario->getId());

        $gruposUsuarios = $this->get('portal.grupo_usuario')
                               ->findByUsuario($usuario->getId());

        $subGrupos = [];
        foreach($gruposUsuarios as $grupoUsuario) {
            $subGrupos[] = $this->get('portal.sub_grupo')
                ->findByGrupoFilho($grupoUsuario->grupousuarioid);
        }

        $listaPermissoesSubGrupo = [];
        foreach($subGrupos as $grupo){

            foreach($grupo as $item) {
                $listaPermissoesSubGrupo[] = $this->get('portal.permissoes_grupo')
                    ->findByGrupo($item->grupoprincipalid);
            }

        }

        $listaPermissoesGrupo = [];
        foreach($gruposUsuarios as $grupoUsuario){
            $listaPermissoesGrupo[]  = $this->get('portal.permissoes_grupo')
                 ->findByGrupo($grupoUsuario->grupousuarioid);
        }


        #Permissoes
        $permissoes = [];
        foreach($permissoesUsuario as $item){
            $permissoes[] = $item['papelid'];
        }


        foreach($listaPermissoesGrupo as $grupo){
            foreach($grupo as $item){
                $permissoes[] = $item->papelid;
            }
        }


        foreach($listaPermissoesSubGrupo as $grupo){
            foreach($grupo as $item){
                $permissoes[] = $item->papelid;
            }
        }


        sort($permissoes);
        $permissoes = array_unique($permissoes);

        $permissoesListaFinal = [];
        foreach($permissoes as $item){
            $permissoesListaFinal[] = $em->getRepository('PortalBundle:Permissoes')
                ->findBy(array('id' => $item));
        }

        return $this->render(':usuario:unique_roles.html.twig', array(
            'permissoesListaFinal' => $permissoesListaFinal,
        ));
    }

    /**
     * @Route("/clientes/{usuario}", name="clientes_from_usuarios")
     * @Method("GET")
     */
    public function getAllClientsFromUsersAction(Usuario $usuario)
    {
        $em = $this->getDoctrine()->getManager();

        $clientes = $em->getRepository('PortalBundle:Usuario')
                       ->getAllClients($usuario->getId());

        return $this->render(':usuario:clientes.html.twig', array(
            'clientes' => $clientes,
        ));

    }

}
