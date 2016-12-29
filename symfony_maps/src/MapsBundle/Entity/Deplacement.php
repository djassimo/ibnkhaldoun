<?php

namespace MapsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Deplacement
 *
 * @ORM\Table(name="deplacement")
 * @ORM\Entity
 */
class Deplacement
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="villeDepart", type="string", length=255, nullable=false)
     */
    private $villedepart;

    /**
     * @var string
     *
     * @ORM\Column(name="villeArrivee", type="string", length=255, nullable=true)
     */
    private $villearrivee;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Deplacement
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
     * Set villedepart
     *
     * @param string $villedepart
     *
     * @return Deplacement
     */
    public function setVilledepart($villedepart)
    {
        $this->villedepart = $villedepart;

        return $this;
    }

    /**
     * Get villedepart
     *
     * @return string
     */
    public function getVilledepart()
    {
        return $this->villedepart;
    }

    /**
     * Set villearrivee
     *
     * @param string $villearrivee
     *
     * @return Deplacement
     */
    public function setVillearrivee($villearrivee)
    {
        $this->villearrivee = $villearrivee;

        return $this;
    }

    /**
     * Get villearrivee
     *
     * @return string
     */
    public function getVillearrivee()
    {
        return $this->villearrivee;
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
