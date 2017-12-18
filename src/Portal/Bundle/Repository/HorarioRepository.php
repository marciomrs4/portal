<?php
/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 29/03/17
 * Time: 10:04
 */

namespace Portal\Bundle\Repository;

use Symfony\Component\DependencyInjection\ContainerInterface;

class HorarioRepository
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    private function getQuery()
    {
        return "SELECT CLI.referencia AS \"Cliente\", EST.descricao AS \"Estabelecimento\",
                    to_char(long2timestamp(domingo),'HH24:MI') AS \"Domingo\",
                    to_char(long2timestamp(segunda),'HH24:MI') AS \"Segunda\",
                    to_char(long2timestamp(terca),'HH24:MI') AS \"Terca\",
                    to_char(long2timestamp(quarta),'HH24:MI') AS \"Quarta\",
                    to_char(long2timestamp(quinta),'HH24:MI') AS \"Quinta\",
                    to_char(long2timestamp(sexta),'HH24:MI') AS \"Sexta\",
                    to_char(long2timestamp(sabado),'HH24:MI') AS \"Sabado\"
                FROM cead_estabelecimento AS EST
                INNER JOIN cead_cliente AS CLI
                ON CLI.codigo = EST.clienteid
                INNER JOIN cead_hor_estab AS HOR
                ON EST.horestableituraid = HOR.id
                WHERE EST.descricao != 'INATIVO'
                ORDER BY 1";
    }

    public function getAllHorarioCorte()
    {

        return $this->container->get('database_connection')
                               ->fetchAll($this->getQuery());

    }

    private function query()
    {
        return "SELECT * FROM equipamento";
    }

}