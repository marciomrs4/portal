<?php

namespace Portal\Bundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class QuotaController extends Controller
{
    /**
     * @Route("/quotas")
     * @Method("GET")
     */
    public function divergenciaQuotaAction()
    {
        $quotas = $this->get('portal.quota')
            ->getQuotaDivergente();

        return $this->render('PortalBundle:Quota:quota_list.html.twig', array(
            'quotas' => $quotas
        ));
    }

    /**
     * @Route("/quotas/json")
     * @Method("GET")
     */
    public function divergenciaQuotaJsonAction()
    {
        $quotas = $this->get('portal.quota')
            ->getQuotaDivergente();

        return new JsonResponse($quotas);
    }

}
