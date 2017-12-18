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
 * @ORM\Table(name="user_grupousuario")
 */
class GrupoUsuarios
{

    /**
     * @ORM\Column(type="bigint")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $discriminador;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isativo;

    /**
     * @ORM\Column(type="string")
     */
    private $nome;

    /**
     * @ORM\Column(type="boolean")
     */
    private $restricted;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set discriminador
     *
     * @param string $discriminador
     *
     * @return GrupoUsuariosEntity
     */
    public function setDiscriminador($discriminador)
    {
        $this->discriminador = $discriminador;

        return $this;
    }

    /**
     * Get discriminador
     *
     * @return string
     */
    public function getDiscriminador()
    {
        return $this->discriminador;
    }

    /**
     * Set isativo
     *
     * @param boolean $isativo
     *
     * @return GrupoUsuariosEntity
     */
    public function setIsativo($isativo)
    {
        $this->isativo = $isativo;

        return $this;
    }

    /**
     * Get isativo
     *
     * @return boolean
     */
    public function getIsativo()
    {
        return $this->isativo;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return GrupoUsuariosEntity
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set restricted
     *
     * @param boolean $restricted
     *
     * @return GrupoUsuariosEntity
     */
    public function setRestricted($restricted)
    {
        $this->restricted = $restricted;

        return $this;
    }

    /**
     * Get restricted
     *
     * @return boolean
     */
    public function getRestricted()
    {
        return $this->restricted;
    }
}
