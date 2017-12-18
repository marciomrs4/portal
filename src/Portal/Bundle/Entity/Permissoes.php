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
 * @ORM\Entity(repositoryClass="Portal\Bundle\Repository\PermissoesRepository")
 * @ORM\Table(name="user_papel")
 */
class Permissoes
{

    /**
     * @ORM\Column(type="string")
     */
    private $nome;

    /**
     * @ORM\Column(type="string")
     */
    private $descricao;

    /**
     * @ORM\Column(type="bigint")
     */
    private $grupopapelid;

    /**
     * @ORM\Column(type="bigint")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $restricted;

    /**
     * @ORM\Column(type="text")
     */
    private $ajuda;


    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return PermissoesEntity
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
     * Set descricao
     *
     * @param string $descricao
     *
     * @return PermissoesEntity
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set grupopapelid
     *
     * @param integer $grupopapelid
     *
     * @return PermissoesEntity
     */
    public function setGrupopapelid($grupopapelid)
    {
        $this->grupopapelid = $grupopapelid;

        return $this;
    }

    /**
     * Get grupopapelid
     *
     * @return integer
     */
    public function getGrupopapelid()
    {
        return $this->grupopapelid;
    }

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
     * Set restricted
     *
     * @param string $restricted
     *
     * @return PermissoesEntity
     */
    public function setRestricted($restricted)
    {
        $this->restricted = $restricted;

        return $this;
    }

    /**
     * Get restricted
     *
     * @return string
     */
    public function getRestricted()
    {
        return $this->restricted;
    }

    /**
     * Set ajuda
     *
     * @param string $ajuda
     *
     * @return PermissoesEntity
     */
    public function setAjuda($ajuda)
    {
        $this->ajuda = $ajuda;

        return $this;
    }

    /**
     * Get ajuda
     *
     * @return string
     */
    public function getAjuda()
    {
        return $this->ajuda;
    }
}
