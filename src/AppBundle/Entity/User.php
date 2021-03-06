<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 16/01/2016
 * Time: 14:51
 */

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Telephone[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Telephone", mappedBy="id")
     */
    protected $telephones;

    public function __construct()
    {
        parent::__construct();
        // your own logic

        $this->telephones = new ArrayCollection();
    }
    /**
     * @var \DateTime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var \DateTime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return User
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return User
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Add telephone
     *
     * @param \AppBundle\Entity\Telephone $telephone
     *
     * @return User
     */
    public function addTelephone(\AppBundle\Entity\Telephone $telephone)
    {
        $this->telephones[] = $telephone;

        return $this;
    }

    /**
     * Remove telephone
     *
     * @param \AppBundle\Entity\Telephone $telephone
     */
    public function removeTelephone(\AppBundle\Entity\Telephone $telephone)
    {
        $this->telephones->removeElement($telephone);
    }

    /**
     * Get telephones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTelephones()
    {
        return $this->telephones;
    }
}
