<?php

namespace Portal\Bundle\Controller;

use Portal\Bundle\Entity\Permissoes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Permisso controller.
 *
 * @Route("permissoesgrupo")
 */
class PermissoesGrupoController extends Controller
{
    /**
     * Lists all permisso entities.
     *
     * @Route("/{grupo}", name="permissoesgrupo_index")
     * @Method("GET")
     */
    public function indexAction($grupo)
    {
        $em = $this->getDoctrine()->getManager();

        $listaPermissoes = $this->get('portal.permissoes_grupo')
                                ->findByGrupo($grupo);

        $grupo = $em->getRepository('PortalBundle:GrupoUsuarios')
                    ->find($grupo);

        $permissoes = [];

        foreach($listaPermissoes as $permissao){

            $permissoes[] = $em->getRepository('PortalBundle:Permissoes')
                               ->findBy(['id' => $permissao->papelid]);

        }

        return $this->render('permissoes/index.html.twig', array(
            'permissoes' => $permissoes,
            'grupo' => $grupo
        ));
    }


}
