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

    private function getPrepareStatament()
    {
        $em = $this->getEntityManager();
        $con = $em->getConnection();
        return $con;
    }

    public function getAllActiveUsersFromAccessDate($acessDate)
    {

        $con = $this->getPrepareStatament();

        $stmt = $con->prepare("select userid, to_char(long2timestamp(dateaslong),'YYYY-MM-DD'), nome, login, email, isativo
                    from user_lastaccess AS ACE
                    inner join user_usuario AS USU
                    ON ACE.userid = USU.id
                    WHERE to_char(long2timestamp(dateaslong),'YYYY-MM-DD') < ?
                    AND isativo = 't'
                    ORDER BY nome");


        $stmt->execute(array($acessDate));

        return $stmt->fetchAll();

    }

    public function getAllClients($usuario)
    {
        $con = $this->getPrepareStatament();

        $stmt = $con->prepare("SELECT cli.codigo, cli.referencia, cli.sigla
                                FROM cead_cliente_usuario AS usu
                                INNER JOIN cead_cliente AS cli
                                ON usu.clientecod = cli.codigo
                                WHERE usuarioid = ?;");

        $stmt->execute(array($usuario));

        return $stmt->fetchAll();
    }

}