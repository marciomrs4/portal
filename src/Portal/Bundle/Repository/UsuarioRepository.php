<?php
/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 29/03/17
 * Time: 10:04
 */

namespace Portal\Bundle\Repository;

use Doctrine\ORM\EntityRepository;

class UsuarioRepository extends EntityRepository
{

    private function getQuery()
    {
        return "select userid, to_char(long2timestamp(dateaslong),'YYYY-MM-DD'), nome, login, email, isativo
                    from user_lastaccess AS ACE
                    inner join user_usuario AS USU
                    ON ACE.userid = USU.id
                    WHERE to_char(long2timestamp(dateaslong),'YYYY-MM-DD') < ?
                    AND isativo = 't'
                    ORDER BY nome";
    }

    public function getAllActiveUsersFromAccessDate($acessDate)
    {
        $em = $this->getEntityManager();

        $con = $em->getConnection();

        $stmt = $con->prepare($this->getQuery());

        $stmt->execute(array($acessDate));

        return $stmt->fetchAll();

    }

}