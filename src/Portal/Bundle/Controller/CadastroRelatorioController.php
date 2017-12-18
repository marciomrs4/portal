<?php

namespace Portal\Bundle\Controller;

use Portal\Bundle\Entity\CadastroRelatorio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Cadastrorelatorio controller.
 *
 * @Route("cadastrorelatorio")
 */
class CadastroRelatorioController extends Controller
{
    /**
     * Lists all cadastroRelatorio entities.
     *
     * @Route("/", name="cadastrorelatorio_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cadastroRelatorios = $em->getRepository('PortalBundle:CadastroRelatorio')->findAll();

        return $this->render('cadastrorelatorio/index.html.twig', array(
            'cadastroRelatorios' => $cadastroRelatorios,
        ));
    }

    /**
     * Finds and displays a cadastroRelatorio entity.
     *
     * @Route("/{id}", name="cadastrorelatorio_show")
     * @Method("GET")
     */
    public function showAction(CadastroRelatorio $cadastroRelatorio)
    {

        $permissao = $this->getDoctrine()
                          ->getRepository('PortalBundle:Permissoes')
                          ->findBy(['nome' => $cadastroRelatorio->getRole()]);

        return $this->render('cadastrorelatorio/show.html.twig', array(
            'cadastroRelatorio' => $cadastroRelatorio,
            'permissao' => $permissao
        ));
    }
}
