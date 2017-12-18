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
 * @ORM\Entity(repositoryClass="Portal\Bundle\Repository\UsuarioPermissaoRepository")
 * @ORM\Table(name="user_usuario_papel")
 */
class UsuarioPermissao
{

    /**
     * @ORM\ManyToMany(targetEntity="Portal\Bundle\Entity\Usuario")
     * @ORM\JoinColumn(name="usuarioid", referencedColumnName="id")
     */
    private $usuarioid;

    /**
     * @ORM\ManyToMany(targetEntity="Portal\Bundle\Entity\PermissoesEntity")
     * @ORM\JoinColumn(name="papelid", referencedColumnName="id")
     */
    private $papelid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usuarioid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->papelid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add usuarioid
     *
     * @param \Portal\Bundle\Entity\Usuario $usuarioid
     *
     * @return UsuarioPermissao
     */
    public function addUsuarioid(\Portal\Bundle\Entity\Usuario $usuarioid)
    {
        $this->usuarioid[] = $usuarioid;

        return $this;
    }

    /**
     * Remove usuarioid
     *
     * @param \Portal\Bundle\Entity\Usuario $usuarioid
     */
    public function removeUsuarioid(\Portal\Bundle\Entity\Usuario $usuarioid)
    {
        $this->usuarioid->removeElement($usuarioid);
    }

    /**
     * Get usuarioid
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsuarioid()
    {
        return $this->usuarioid;
    }

    /**
     * Add papelid
     *
     * @param \Portal\Bundle\Entity\PermissoesEntity $papelid
     *
     * @return UsuarioPermissao
     */
    public function addPapelid(\Portal\Bundle\Entity\PermissoesEntity $papelid)
    {
        $this->papelid[] = $papelid;

        return $this;
    }

    /**
     * Remove papelid
     *
     * @param \Portal\Bundle\Entity\PermissoesEntity $papelid
     */
    public function removePapelid(\Portal\Bundle\Entity\PermissoesEntity $papelid)
    {
        $this->papelid->removeElement($papelid);
    }

    /**
     * Get papelid
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPapelid()
    {
        return $this->papelid;
    }

}
