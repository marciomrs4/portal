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
        return 'SELECT p.id, g.descricao AS "grupo", p.nome, p.descricao, p.ajuda
                    FROM user_papel AS p
                    INNER JOIN user_grupopapel AS g
                    ON p.grupopapelid = g.id
                    ORDER BY g.descricao, p.nome;';
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