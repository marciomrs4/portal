<?php
/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 29/03/17
 * Time: 10:04
 */

namespace Portal\Bundle\Repository;

use Doctrine\ORM\EntityRepository;

class PermissoesRepository extends EntityRepository
{

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

    public function getAllPermissoes()
    {
        $em = $this->getEntityManager();

        $con = $em->getConnection();

        $stmt = $con->prepare($this->getQuery());

        $stmt->execute();

        return $stmt->fetchAll();

    }

}