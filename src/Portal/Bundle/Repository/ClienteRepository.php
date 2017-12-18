<?php
/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 29/03/17
 * Time: 10:04
 */

namespace Portal\Bundle\Repository;

use Symfony\Component\DependencyInjection\ContainerInterface;

class ClienteRepository
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    private function getQuery()
    {
        return "select 	referencia,
                        descricao,
                        periodicidade,
                        numperiodos,
                        ignorarconsumozero,
                        intervaloestoquemindias,
                        intervaloestoquemaxdias
                from cead_cliente
                where periodicidade is not null";
    }

    public function getAllClienteParameters()
    {

        return $this->container->get('database_connection')
            ->fetchAll($this->getQuery());

    }

}