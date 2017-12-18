<?php
/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 29/03/17
 * Time: 10:01
 */

namespace Portal\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="user_usuario_grupousuario")
 */
class GrupoUsuarioPermissao
{

    /**
     * @ORM\ManyToMany(targetEntity="Portal\Bundle\Entity\GrupoUsuariosEntity")
     * @ORM\JoinColumn(name="usuarioid", referencedColumnName="id")
     */
    private $grupousuarioid;

    /**
     * @ORM\ManyToMany(targetEntity="Portal\Bundle\Entity\PermissoesEntity")
     * @ORM\JoinColumn(name="papelid", referencedColumnName="id")
     */
    private $usuarioid;

}
