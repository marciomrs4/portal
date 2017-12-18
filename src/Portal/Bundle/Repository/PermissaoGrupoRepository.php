<?php
/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 29/03/17
 * Time: 10:04
 */

namespace Portal\Bundle\Repository;

use Symfony\Component\DependencyInjection\ContainerInterface;

class PermissaoGrupoRepository
{

    private $container;

    public function __construct(ContainerInterface $containerInterface)
    {
        $this->container = $containerInterface;
    }

    private function getPrepare($query)
    {
        $stmt = $this->container->get('doctrine.orm.default_entity_manager')
            ->getConnection()
            ->prepare($query);

        return $stmt;
    }

    public function listarTodos()
    {

        $query =  "SELECT grupousuarioid, papelid
                    FROM user_grupousuario_papel";

        $stmt = $this->getPrepare($query);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findByGrupo($grupo)
    {
        $query =  "SELECT grupousuarioid, papelid
                    FROM user_grupousuario_papel
                     WHERE grupousuarioid = ?
                     ORDER BY papelid";

        $stmt = $this->getPrepare($query);

        $stmt->execute(array($grupo));

        return $stmt->fetchAll(\PDO::FETCH_OBJ);

    }

    public function findByPermisao($permissao)
    {
        $query =  "SELECT grupousuarioid, papelid
                    FROM user_grupousuario_papel
                     WHERE papelid = ?
                     ORDER BY papelid";

        $stmt = $this->getPrepare($query);

        $stmt->execute(array($permissao));

        return $stmt->fetchAll(\PDO::FETCH_OBJ);


    }

}
