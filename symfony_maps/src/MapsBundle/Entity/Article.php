<?php

namespace MapsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="FKArticle481198", columns={"datesejourid"})})
 * @ORM\Entity
 */
class Article
{
    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="datesejourid", type="integer", nullable=true)
     */
    private $datesejourid;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Datesejour", inversedBy="articles")
     * @ORM\JoinColumn(name="datesejourid", referencedColumnName="id")
     */
    private $sejour;

    /**
     * Get sejour
     *
     * @return Datesejour
     */
    public function getSejour()
    {
        return $this->sejour;
    }

    /**
     * @ORM\OneToMany(targetEntity="Media", mappedBy="article")
     */
    private $medias;

    public function __construct()
    {
        $this->medias = new ArrayCollection();
    }


    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Article
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Article
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set datesejourid
     *
     * @param integer $datesejourid
     *
     * @return Article
     */
    public function setDatesejourid($datesejourid)
    {
        $this->datesejourid = $datesejourid;

        return $this;
    }

    /**
     * Get datesejourid
     *
     * @return integer
     */
    public function getDatesejourid()
    {
        return $this->datesejourid;
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
