<?php

namespace PrekeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Preke
 *
 * @ORM\Table(name="preke")
 * @ORM\Entity(repositoryClass="PrekeBundle\Repository\PrekeRepository")
 */
class Preke
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="pavadinimas", type="string", length=50, unique=true)
     */
    private $pavadinimas;

    /**
     * @var string
     *
     * @ORM\Column(name="aprasymas", type="string", length=255)
     */
    private $aprasymas;

    /**
     * @var float
     *
     * @ORM\Column(name="kaina", type="float")
     */
    private $kaina;

    /**
     * @var float
     *
     * @ORM\Column(name="akcijineKaina", type="float", nullable=true)
     */
    private $akcijineKaina;

    /**
     * @var string
     *
     * @ORM\Column(name="kategorija", type="string", length=30)
     */
    private $kategorija;

    /**
     * @var int
     *
     * @ORM\Column(name="likusiuKiekis", type="integer")
     */
    private $likusiuKiekis;

    /**
     * @var int
     *
     * @ORM\Column(name="parduotuKiekis", type="integer")
     */
    private $parduotuKiekis;

    /**
     * @var string
     *
     * @ORM\Column(name="busena", type="string", length=255)
     */
    private $busena;

    /**
     * @var string
     *
     * @ORM\Column(name="spalva", type="string", length=255)
     */
    private $spalva;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pagaminimoData", type="datetime")
     */
    private $pagaminimoData;

    /**
     * @var string
     *
     * @ORM\Column(name="kilmesSalis", type="string", length=50)
     */
    private $kilmesSalis;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pavadinimas
     *
     * @param string $pavadinimas
     *
     * @return Preke
     */
    public function setPavadinimas($pavadinimas)
    {
        $this->pavadinimas = $pavadinimas;

        return $this;
    }

    /**
     * Get pavadinimas
     *
     * @return string
     */
    public function getPavadinimas()
    {
        return $this->pavadinimas;
    }

    /**
     * Set aprasymas
     *
     * @param string $aprasymas
     *
     * @return Preke
     */
    public function setAprasymas($aprasymas)
    {
        $this->aprasymas = $aprasymas;

        return $this;
    }

    /**
     * Get aprasymas
     *
     * @return string
     */
    public function getAprasymas()
    {
        return $this->aprasymas;
    }

    /**
     * Set kaina
     *
     * @param float $kaina
     *
     * @return Preke
     */
    public function setKaina($kaina)
    {
        $this->kaina = $kaina;

        return $this;
    }

    /**
     * Get kaina
     *
     * @return float
     */
    public function getKaina()
    {
        return $this->kaina;
    }

    /**
     * Set akcijineKaina
     *
     * @param float $akcijineKaina
     *
     * @return Preke
     */
    public function setAkcijineKaina($akcijineKaina)
    {
        $this->akcijineKaina = $akcijineKaina;

        return $this;
    }

    /**
     * Get akcijineKaina
     *
     * @return float
     */
    public function getAkcijineKaina()
    {
        return $this->akcijineKaina;
    }

    /**
     * Set kategorija
     *
     * @param string $kategorija
     *
     * @return Preke
     */
    public function setKategorija($kategorija)
    {
        $this->kategorija = $kategorija;

        return $this;
    }

    /**
     * Get kategorija
     *
     * @return string
     */
    public function getKategorija()
    {
        return $this->kategorija;
    }

    /**
     * Set likusiuKiekis
     *
     * @param integer $likusiuKiekis
     *
     * @return Preke
     */
    public function setLikusiuKiekis($likusiuKiekis)
    {
        $this->likusiuKiekis = $likusiuKiekis;

        return $this;
    }

    /**
     * Get likusiuKiekis
     *
     * @return int
     */
    public function getLikusiuKiekis()
    {
        return $this->likusiuKiekis;
    }

    /**
     * Set parduotuKiekis
     *
     * @param integer $parduotuKiekis
     *
     * @return Preke
     */
    public function setParduotuKiekis($parduotuKiekis)
    {
        $this->parduotuKiekis = $parduotuKiekis;

        return $this;
    }

    /**
     * Get parduotuKiekis
     *
     * @return int
     */
    public function getParduotuKiekis()
    {
        return $this->parduotuKiekis;
    }

    /**
     * Set busena
     *
     * @param string $busena
     *
     * @return Preke
     */
    public function setBusena($busena)
    {
        $this->busena = $busena;

        return $this;
    }

    /**
     * Get busena
     *
     * @return string
     */
    public function getBusena()
    {
        return $this->busena;
    }

    /**
     * Set spalva
     *
     * @param string $spalva
     *
     * @return Preke
     */
    public function setSpalva($spalva)
    {
        $this->spalva = $spalva;

        return $this;
    }

    /**
     * Get spalva
     *
     * @return string
     */
    public function getSpalva()
    {
        return $this->spalva;
    }

    /**
     * Set pagaminimoData
     *
     * @param \DateTime $pagaminimoData
     *
     * @return Preke
     */
    public function setPagaminimoData($pagaminimoData)
    {
        $this->pagaminimoData = $pagaminimoData;

        return $this;
    }

    /**
     * Get pagaminimoData
     *
     * @return \DateTime
     */
    public function getPagaminimoData()
    {
        return $this->pagaminimoData;
    }

    /**
     * Set kilmesSalis
     *
     * @param string $kilmesSalis
     *
     * @return Preke
     */
    public function setKilmesSalis($kilmesSalis)
    {
        $this->kilmesSalis = $kilmesSalis;

        return $this;
    }

    /**
     * Get kilmesSalis
     *
     * @return string
     */
    public function getKilmesSalis()
    {
        return $this->kilmesSalis;
    }
}

