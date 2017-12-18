<?php
/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 29/03/17
 * Time: 10:04
 */

namespace Portal\Bundle\Repository;

use Symfony\Component\DependencyInjection\ContainerInterface;

class UsuarioGrupoUsuarioRepository
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

        $query =  "SELECT grupousuarioid, usuarioid
                    FROM user_usuario_grupousuario";

        $stmt = $this->getPrepare($query);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findByGrupo($grupo)
    {
        $query = "SELECT grupousuarioid, usuarioid
                    FROM user_usuario_grupousuario
                     WHERE grupousuarioid = ?";

        $stmt = $this->getPrepare($query);

        $stmt->execute(array($grupo));

        return $stmt->fetchAll(\PDO::FETCH_OBJ);

    }

    public function findByUsuario($usuario)
    {
        $query = "SELECT grupousuarioid, usuarioid
                    FROM user_usuario_grupousuario
                     WHERE usuarioid = ?";

        $stmt = $this->getPrepare($query);

        $stmt->execute(array($usuario));

        return $stmt->fetchAll(\PDO::FETCH_OBJ);

    }

}
