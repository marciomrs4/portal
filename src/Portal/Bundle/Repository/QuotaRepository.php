<?php
/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 29/03/17
 * Time: 10:04
 */

namespace Portal\Bundle\Repository;

use Symfony\Component\DependencyInjection\ContainerInterface;

class QuotaRepository
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    private function getQuery()
    {
        return "SELECT
                    X.referencia, X.quota, Y.estoque
                    FROM (
                        SELECT a.referencia, SUM(q.quantidade) AS quota
                        FROM cead_artigo a
                        INNER JOIN cead_quota q ON a.codigo = q.artigoid
                        WHERE a.ativo = true
                        GROUP BY a.referencia
                        ORDER BY a.referencia ) AS X
                    LEFT JOIN (
                        SELECT a.referencia, SUM(quantidade) AS estoque
                        FROM cead_posicao_estoque p
                        INNER JOIN cead_artigo a ON a.codigo = p.artigoid
                        WHERE p.terproref = 'OS'
                        GROUP BY a.referencia
                        ORDER BY a.referencia
                    ) AS Y
                    ON X.referencia = Y.referencia
                    WHERE X.quota <> Y.estoque";
    }

    public function getQuotaDivergente()
    {

        return $this->container->get('database_connection')
            ->fetchAll($this->getQuery());

    }

}
