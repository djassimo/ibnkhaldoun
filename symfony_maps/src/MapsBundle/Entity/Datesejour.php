<?php

namespace MapsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Datesejour
 *
 * @ORM\Table(name="datesejour", indexes={@ORM\Index(name="FKDateSejour861097", columns={"Localisationid"})})
 * @ORM\Entity
 */
class Datesejour
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeb", type="date", nullable=true)
     */
    private $datedeb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date", nullable=true)
     */
    private $datefin;

    /**
     * @var integer
     *
     * @ORM\Column(name="Localisationid", type="integer", nullable=false)
     */
    private $localisationid;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Article", mappedBy="sejour")
     */
    private $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    /**
     * Get articles
     *
     * @return Article
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * Set datedeb
     *
     * @param \DateTime $datedeb
     *
     * @return Datesejour
     */
    public function setDatedeb($datedeb)
    {
        $this->datedeb = $datedeb;

        return $this;
    }

    /**
     * Get datedeb
     *
     * @return \DateTime
     */
    public function getDatedeb()
    {
        return $this->datedeb;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     *
     * @return Datesejour
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * Set localisationid
     *
     * @param integer $localisationid
     *
     * @return Datesejour
     */
    public function setLocalisationid($localisationid)
    {
        $this->localisationid = $localisationid;

        return $this;
    }

    /**
     * Get localisationid
     *
     * @return integer
     */
    public function getLocalisationid()
    {
        return $this->localisationid;
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
}
