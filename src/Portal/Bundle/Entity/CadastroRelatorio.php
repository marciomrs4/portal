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
 * @ORM\Table(name="cead_relatorio")
 */
class CadastroRelatorio
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nome;

    /**
     * @ORM\Column(type="text")
     */
    private $script;

    /**
     * @ORM\Column(type="text")
     */
    private $jrxml;

    /**
     * @ORM\Column(type="string")
     */
    private $role;

    /**
     * @ORM\Column(type="string")
     */
    private $grupo;


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
     * Set nome
     *
     * @param string $nome
     *
     * @return CadastroRelatorio
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
     * Set script
     *
     * @param string $script
     *
     * @return CadastroRelatorio
     */
    public function setScript($script)
    {
        $this->script = $script;

        return $this;
    }

    /**
     * Get script
     *
     * @return string
     */
    public function getScript()
    {
        return $this->script;
    }

    /**
     * Set jrxml
     *
     * @param string $jrxml
     *
     * @return CadastroRelatorio
     */
    public function setJrxml($jrxml)
    {
        $this->jrxml = $jrxml;

        return $this;
    }

    /**
     * Get jrxml
     *
     * @return string
     */
    public function getJrxml()
    {
        return $this->jrxml;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return CadastroRelatorio
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set grupo
     *
     * @param string $grupo
     *
     * @return CadastroRelatorio
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return string
     */
    public function getGrupo()
    {
        return $this->grupo;
    }
}
