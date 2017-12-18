<?php
/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 29/03/17
 * Time: 10:04
 */

namespace Portal\Bundle\Repository;

use Symfony\Component\DependencyInjection\ContainerInterface;

class SubGrupo
{

    private $container;

    private $query = "SELECT grupoprincipalfilhoid,
                          grupoprincipalid
                      FROM user_grupousuario_pai_filho";

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

        $query =  "SELECT grupoprincipalfilhoid,
                          grupoprincipalid
                      FROM user_grupousuario_pai_filho;";

        $stmt = $this->getPrepare($query);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findByGrupoPai($grupoPai)
    {
        $query = $this->query . " WHERE grupoprincipalid = ?";

        $stmt = $this->getPrepare($query);

        $stmt->execute(array($grupoPai));

        return $stmt->fetchAll(\PDO::FETCH_OBJ);

    }

    public function findByGrupoFilho($grupoFilho)
    {
        $query = $this->query . " WHERE grupoprincipalfilhoid = ?";

        $stmt = $this->getPrepare($query);

        $stmt->execute(array($grupoFilho));

        return $stmt->fetchAll(\PDO::FETCH_OBJ);

    }

}
