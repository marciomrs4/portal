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
 * @ORM\Entity(repositoryClass="Portal\Bundle\Repository\UsuarioRepository")
 * @ORM\Table(name="user_usuario")
 */
class Usuario
{

    /**
     * @ORM\Column(type="string")
     */
    private $login;

    /**
     * @ORM\Column(type="boolean")
     */
    private $alterarsenha;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isativo;

    /**
     * @ORM\Column(type="bigint")
     */
    private $dataexpiracaoaslong;

    /**
     * @ORM\Column(type="bigint")
     */
    private $dtultimaalteracaoaslong;

    /**
     * @ORM\Column(type="string")
     */
    private $senha;

    /**
     * @ORM\Column(type="boolean")
     */
    private $trocasenhaproximologin;

    /**
     * @ORM\Column(type="string")
     */
    private $nome;

    /**
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @ORM\Column(type="bigint")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isusado;

    /**
     * @ORM\Column(type="bigint")
     */
    private $dataultimoacessoaslong;

    /**
     * @ORM\Column(type="string")
     */
    private $aplicacaoultimoacesso;

    /**
     * @ORM\Column(type="boolean")
     */
    private $autenticacaoexterna;

    /**
     * @ORM\Column(type="boolean")
     */
    private $restricted;

    /**
     * @ORM\Column(type="integer")
     */
    private $invalidloginattempts;

    /**
     * @ORM\Column(type="bigint")
     */
    private $domainid;


    /**
     * Set login
     *
     * @param string $login
     *
     * @return Usuario
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set alterarsenha
     *
     * @param boolean $alterarsenha
     *
     * @return Usuario
     */
    public function setAlterarsenha($alterarsenha)
    {
        $this->alterarsenha = $alterarsenha;

        return $this;
    }

    /**
     * Get alterarsenha
     *
     * @return boolean
     */
    public function getAlterarsenha()
    {
        return $this->alterarsenha;
    }

    /**
     * Set isativo
     *
     * @param boolean $isativo
     *
     * @return Usuario
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
     * Set dataexpiracaoaslong
     *
     * @param integer $dataexpiracaoaslong
     *
     * @return Usuario
     */
    public function setDataexpiracaoaslong($dataexpiracaoaslong)
    {
        $this->dataexpiracaoaslong = $dataexpiracaoaslong;

        return $this;
    }

    /**
     * Get dataexpiracaoaslong
     *
     * @return integer
     */
    public function getDataexpiracaoaslong()
    {
        return $this->dataexpiracaoaslong;
    }

    /**
     * Set dtultimaalteracaoaslong
     *
     * @param integer $dtultimaalteracaoaslong
     *
     * @return Usuario
     */
    public function setDtultimaalteracaoaslong($dtultimaalteracaoaslong)
    {
        $this->dtultimaalteracaoaslong = $dtultimaalteracaoaslong;

        return $this;
    }

    /**
     * Get dtultimaalteracaoaslong
     *
     * @return integer
     */
    public function getDtultimaalteracaoaslong()
    {
        return $this->dtultimaalteracaoaslong;
    }

    /**
     * Set senha
     *
     * @param string $senha
     *
     * @return Usuario
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get senha
     *
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set trocasenhaproximologin
     *
     * @param boolean $trocasenhaproximologin
     *
     * @return Usuario
     */
    public function setTrocasenhaproximologin($trocasenhaproximologin)
    {
        $this->trocasenhaproximologin = $trocasenhaproximologin;

        return $this;
    }

    /**
     * Get trocasenhaproximologin
     *
     * @return boolean
     */
    public function getTrocasenhaproximologin()
    {
        return $this->trocasenhaproximologin;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Usuario
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
     * Set email
     *
     * @param string $email
     *
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
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
     * Set isusado
     *
     * @param boolean $isusado
     *
     * @return Usuario
     */
    public function setIsusado($isusado)
    {
        $this->isusado = $isusado;

        return $this;
    }

    /**
     * Get isusado
     *
     * @return boolean
     */
    public function getIsusado()
    {
        return $this->isusado;
    }

    /**
     * Set dataultimoacessoaslong
     *
     * @param integer $dataultimoacessoaslong
     *
     * @return Usuario
     */
    public function setDataultimoacessoaslong($dataultimoacessoaslong)
    {
        $this->dataultimoacessoaslong = $dataultimoacessoaslong;

        return $this;
    }

    /**
     * Get dataultimoacessoaslong
     *
     * @return integer
     */
    public function getDataultimoacessoaslong()
    {
        return $this->dataultimoacessoaslong;
    }

    /**
     * Set aplicacaoultimoacesso
     *
     * @param string $aplicacaoultimoacesso
     *
     * @return Usuario
     */
    public function setAplicacaoultimoacesso($aplicacaoultimoacesso)
    {
        $this->aplicacaoultimoacesso = $aplicacaoultimoacesso;

        return $this;
    }

    /**
     * Get aplicacaoultimoacesso
     *
     * @return string
     */
    public function getAplicacaoultimoacesso()
    {
        return $this->aplicacaoultimoacesso;
    }

    /**
     * Set autenticacaoexterna
     *
     * @param boolean $autenticacaoexterna
     *
     * @return Usuario
     */
    public function setAutenticacaoexterna($autenticacaoexterna)
    {
        $this->autenticacaoexterna = $autenticacaoexterna;

        return $this;
    }

    /**
     * Get autenticacaoexterna
     *
     * @return boolean
     */
    public function getAutenticacaoexterna()
    {
        return $this->autenticacaoexterna;
    }

    /**
     * Set restricted
     *
     * @param boolean $restricted
     *
     * @return Usuario
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

    /**
     * Set invalidloginattempts
     *
     * @param integer $invalidloginattempts
     *
     * @return Usuario
     */
    public function setInvalidloginattempts($invalidloginattempts)
    {
        $this->invalidloginattempts = $invalidloginattempts;

        return $this;
    }

    /**
     * Get invalidloginattempts
     *
     * @return integer
     */
    public function getInvalidloginattempts()
    {
        return $this->invalidloginattempts;
    }

    /**
     * Set domainid
     *
     * @param integer $domainid
     *
     * @return Usuario
     */
    public function setDomainid($domainid)
    {
        $this->domainid = $domainid;

        return $this;
    }

    /**
     * Get domainid
     *
     * @return integer
     */
    public function getDomainid()
    {
        return $this->domainid;
    }
}
