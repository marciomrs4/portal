<?php
/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 29/03/17
 * Time: 10:04
 */

namespace Portal\Bundle\Repository;

use Symfony\Component\DependencyInjection\ContainerInterface;

class UsuarioPermissaoRepository
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

        $query =  "SELECT usuarioid, papelid
                    FROM user_usuario_papel";

        $stmt = $this->getPrepare($query);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findByUsuario($usuario)
    {
        $query = "SELECT usuarioid, papelid
                    FROM user_usuario_papel
                     WHERE usuarioid = ?";

        $stmt = $this->getPrepare($query);

        $stmt->execute(array($usuario));

        return $stmt->fetchAll();

    }

    public function findByPermisao($permissao)
    {
        $query = "SELECT usuarioid, papelid
                    FROM user_usuario_papel
                    WHERE papelid = ?";

        $stmt = $this->getPrepare($query);

        $stmt->execute(array($permissao));

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

}
