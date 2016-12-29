<?php

namespace MapsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Media
 *
 * @ORM\Table(name="media", indexes={@ORM\Index(name="FKMedia991150", columns={"Articleid"})})
 * @ORM\Entity
 */
class Media
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
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="video", type="string", length=255, nullable=true)
     */
    private $video;

    /**
     * @var integer
     *
     * @ORM\Column(name="Articleid", type="integer", nullable=false)
     */

    private $articleid;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Article", inversedBy="medias")
     * @ORM\JoinColumn(name="Articleid", referencedColumnName="id")
     */
    private $article;



    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Media
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
     * Set image
     *
     * @param string $image
     *
     * @return Media
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set video
     *
     * @param string $video
     *
     * @return Media
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set articleid
     *
     * @param integer $articleid
     *
     * @return Media
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
