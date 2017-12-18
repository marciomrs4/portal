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
 * @ORM\Table(name="dynr_relatoriodinamico")
 */
class RelatorioDinamico
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
     * @ORM\Column(type="string")
     */
    private $grupo;

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
    private $permissao;

    /**
     * @ORM\Column(type="string")
     */
    private $codigo;

    /**
     * @ORM\Column(type="string")
     */
    private $interno;

    /**
     * @ORM\Column(type="boolean")
     */
    private $modulo;

    /**
     * @ORM\Column(type="string")
     */
    private $applicationid;

    /**
     * @ORM\Column(type="string")
     */
    private $versao;

    /**
     * @ORM\Column(type="boolean")
     */
    private $travaratualizacao;


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
     * @return RelatorioDinamico
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
     * Set grupo
     *
     * @param string $grupo
     *
     * @return RelatorioDinamico
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

    /**
     * Set script
     *
     * @param string $script
     *
     * @return RelatorioDinamico
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
     * @return RelatorioDinamico
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
     * Set permissao
     *
     * @param string $permissao
     *
     * @return RelatorioDinamico
     */
    public function setPermissao($permissao)
    {
        $this->permissao = $permissao;

        return $this;
    }

    /**
     * Get permissao
     *
     * @return string
     */
    public function getPermissao()
    {
        return $this->permissao;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     *
     * @return RelatorioDinamico
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set interno
     *
     * @param string $interno
     *
     * @return RelatorioDinamico
     */
    public function setInterno($interno)
    {
        $this->interno = $interno;

        return $this;
    }

    /**
     * Get interno
     *
     * @return string
     */
    public function getInterno()
    {
        return $this->interno;
    }

    /**
     * Set modulo
     *
     * @param boolean $modulo
     *
     * @return RelatorioDinamico
     */
    public function setModulo($modulo)
    {
        $this->modulo = $modulo;

        return $this;
    }

    /**
     * Get modulo
     *
     * @return boolean
     */
    public function getModulo()
    {
        return $this->modulo;
    }

    /**
     * Set applicationid
     *
     * @param string $applicationid
     *
     * @return RelatorioDinamico
     */
    public function setApplicationid($applicationid)
    {
        $this->applicationid = $applicationid;

        return $this;
    }

    /**
     * Get applicationid
     *
     * @return string
     */
    public function getApplicationid()
    {
        return $this->applicationid;
    }

    /**
     * Set versao
     *
     * @param string $versao
     *
     * @return RelatorioDinamico
     */
    public function setVersao($versao)
    {
        $this->versao = $versao;

        return $this;
    }

    /**
     * Get versao
     *
     * @return string
     */
    public function getVersao()
    {
        return $this->versao;
    }

    /**
     * Set travaratualizacao
     *
     * @param boolean $travaratualizacao
     *
     * @return RelatorioDinamico
     */
    public function setTravaratualizacao($travaratualizacao)
    {
        $this->travaratualizacao = $travaratualizacao;

        return $this;
    }

    /**
     * Get travaratualizacao
     *
     * @return boolean
     */
    public function getTravaratualizacao()
    {
        return $this->travaratualizacao;
    }
}
