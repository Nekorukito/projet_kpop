<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ChansonRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * /**
 * @ApiResource(
 *     attributes={"security"="is_granted('ROLE_USER')"},
 *     collectionOperations={
 *          "get"={"security"="is_granted('ROLE_USER')" , "security_message"="Vous devez être connecté pour avoir accès à ces ressources"},
 *          "post"={"security"="is_granted('ROLE_ADMIN')" , "security_message"="Vous devez être administrateur pour poster"},
 *     }
 * )
 * @ORM\Entity(repositoryClass=ChansonRepository::class)
 */
class Chanson
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ({"rw:album"})
     */
    private $titre;

    /**
     * @ORM\ManyToOne(targetEntity=Album::class, inversedBy="chansons")
     */
    private $Album;

    /**
     * @ORM\Column(type="time")
     */
    private $Duree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Langues;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Lien;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Lyric;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getAlbum(): ?Album
    {
        return $this->Album;
    }

    public function setAlbum(?Album $Album): self
    {
        $this->Album = $Album;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->Duree;
    }

    public function setDuree(\DateTimeInterface $Duree): self
    {
        $this->Duree = $Duree;

        return $this;
    }

    public function getLangues(): ?string
    {
        return $this->Langues;
    }

    public function setLangues(string $Langues): self
    {
        $this->Langues = $Langues;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->Lien;
    }

    public function setLien(?string $Lien): self
    {
        $this->Lien = $Lien;

        return $this;
    }

    public function getLyric(): ?string
    {
        return $this->Lyric;
    }

    public function setLyric(?string $Lyric): self
    {
        $this->Lyric = $Lyric;

        return $this;
    }


}
