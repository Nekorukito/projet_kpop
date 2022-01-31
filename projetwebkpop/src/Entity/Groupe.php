<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * /**
 * @ApiResource(
 *     attributes={"security"="is_granted('ROLE_USER')"},
 *     collectionOperations={
 *          "get"={"security"="is_granted('ROLE_USER')" , "security_message"="Vous devez être connecté pour avoir accès à ces ressources"},
 *          "post"={"security"="is_granted('ROLE_ADMIN')" , "security_message"="Vous devez être administrateur pour poster"},
 *     },
 *    normalizationContext={"groups" ={"read:groupe"}},
 *     denormalizationContext={"groups"={"write:groupe"}},
 * )
 * @ORM\Entity(repositoryClass=GroupeRepository::class)
 */
class Groupe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ({"read:groupe","write:groupe","rw:album","rw:artiste"})
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     * @Groups ({"read:groupe","write:groupe"})
     */
    private $nbMembres;

    /**
     * @ORM\Column(type="date")
     * @Groups ({"read:groupe","write:groupe"})
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ({"write:groupe"})
     */
    private $Logo;

    /**
     * @ORM\OneToMany(targetEntity=Artiste::class, mappedBy="groupe" , cascade={"remove"})
     * @Groups ({"write:groupe","read:groupe"})
     */
    private $artistes;

    /**
     * @ORM\OneToMany(targetEntity=Album::class, mappedBy="groupe", cascade={"remove"})
     * @Groups ({"read:groupe","write:groupe"})
     */
    private $Albums;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups ({"read:groupe","write:groupe"})
     */
    private $Description;

    public function __construct()
    {
        $this->artistes = new ArrayCollection();
        $this->Albums = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNbMembres(): ?int
    {
        return $this->nbMembres;
    }

    public function setNbMembres(int $nbMembres): self
    {
        $this->nbMembres = $nbMembres;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->Logo;
    }

    public function setLogo(string $Logo): self
    {
        $this->Logo = $Logo;

        return $this;
    }

    /**
     * @return Collection|Artiste[]
     */
    public function getArtistes(): Collection
    {
        return $this->artistes;
    }

    public function addArtiste(Artiste $artiste): self
    {
        if (!$this->artistes->contains($artiste)) {
            $this->artistes[] = $artiste;
            $artiste->setGroupe($this);
        }

        return $this;
    }

    public function removeArtiste(Artiste $artiste): self
    {
        if ($this->artistes->removeElement($artiste)) {
            // set the owning side to null (unless already changed)
            if ($artiste->getGroupe() === $this) {
                $artiste->setGroupe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Album[]
     */
    public function getAlbums(): Collection
    {
        return $this->Albums;
    }

    public function addAlbum(Album $album): self
    {
        if (!$this->Albums->contains($album)) {
            $this->Albums[] = $album;
            $album->setGroupe($this);
        }

        return $this;
    }

    public function removeAlbum(Album $album): self
    {
        if ($this->Albums->removeElement($album)) {
            // set the owning side to null (unless already changed)
            if ($album->getGroupe() === $this) {
                $album->setGroupe(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function __toString()
    {
        return $this->getNom();
    }

}
