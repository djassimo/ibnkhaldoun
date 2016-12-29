<?php

namespace MapsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire", indexes={@ORM\Index(name="FKCommentair206813", columns={"Utilisateurid"}), @ORM\Index(name="FKCommentair385326", columns={"Articleid"})})
 * @ORM\Entity
 */
class Commentaire
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCom", type="date", nullable=true)
     */
    private $datecom;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text", length=65535, nullable=true)
     */
    private $contenu;

    /**
     * @var integer
     *
     * @ORM\Column(name="Articleid", type="integer", nullable=false)
     */
    private $articleid;

    /**
     * @var integer
     *
     * @ORM\Column(name="Utilisateurid", type="integer", nullable=false)
     */
    private $utilisateurid;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set datecom
     *
     * @param \DateTime $datecom
     *
     * @return Commentaire
     */
    public function setDatecom($datecom)
    {
        $this->datecom = $datecom;

        return $this;
    }

    /**
     * Get datecom
     *
     * @return \DateTime
     */
    public function getDatecom()
    {
        return $this->datecom;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Commentaire
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set articleid
     *
     * @param integer $articleid
     *
     * @return Commentaire
     */
    public function setArticleid($articleid)
    {
        $this->articleid = $articleid;

        return $this;
    }

    /**
     * Get articleid
     *
     * @return integer
     */
    public function getArticleid()
    {
        return $this->articleid;
    }

    /**
     * Set utilisateurid
     *
     * @param integer $utilisateurid
     *
     * @return Commentaire
     */
    public function setUtilisateurid($utilisateurid)
    {
        $this->utilisateurid = $utilisateurid;

        return $this;
    }

    /**
     * Get utilisateurid
     *
     * @return integer
     */
    public function getUtilisateurid()
    {
        return $this->utilisateurid;
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
