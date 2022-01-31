<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AlbumRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * /**
 * @ApiResource(
 *     attributes={"security"="is_granted('ROLE_USER')"},
 *     collectionOperations={
 *          "get"={"security"="is_granted('ROLE_USER')" , "security_message"="Vous devez être connecté pour avoir accès à ces ressources"},
 *          "post"={"security"="is_granted('ROLE_ADMIN')" , "security_message"="Vous devez être administrateur pour poster"},
 *     },
 *    normalizationContext={"groups" ={"read:album","rw:album"}},
 *     denormalizationContext={"groups"={"write:album"}},
 * )
 * @ORM\Entity(repositoryClass=AlbumRepository::class)
 * @Vich\Uploadable

 */
class Album
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ({"read:album","read:groupe","write:album"})
    )
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     * @Groups ({"read:album","write:album"})

     */
    private $NbMorceaux;

    /**
     * @ORM\Column(type="date")
     * @Groups ({"read:album","write:album"})
     */
    private $dateSortie;

    /**
     * @ORM\ManyToOne(targetEntity=Groupe::class, inversedBy="Albums")
     * @ORM\JoinColumn(nullable=false)
     * @Groups ({"read:album","write:album","rw:album"})
     */
    private $groupe;

    /**
     * @ORM\OneToMany(targetEntity=Chanson::class, mappedBy="Album", cascade={"remove"})
     * @Groups ({"read:album","rw:album"})
     */
    private $chansons;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Affiche;

    /**
     * @Vich\UploadableField(mapping="album_img", fileNameProperty="Affiche")
     * @var File|null
     */
    private $AfficheFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTimeInterface|null
     */
    private $updatedAt;



    public function __construct()
    {
        $this->chansons = new ArrayCollection();
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

    public function getNbMorceaux(): ?int
    {
        return $this->NbMorceaux;
    }

    public function setNbMorceaux(int $NbMorceaux): self
    {
        $this->NbMorceaux = $NbMorceaux;

        return $this;
    }

    public function getDateSortie(): ?DateTimeInterface
    {
        return $this->dateSortie;
    }

    public function setDateSortie(DateTimeInterface $dateSortie): self
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    public function getGroupe(): ?Groupe
    {
        return $this->groupe;
    }

    public function setGroupe(?Groupe $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    /**
     * @return Collection|Chanson[]
     */
    public function getChansons(): Collection
    {
        return $this->chansons;
    }

    public function addChanson(Chanson $chanson): self
    {
        if (!$this->chansons->contains($chanson)) {
            $this->chansons[] = $chanson;
            $chanson->setAlbum($this);
        }

        return $this;
    }

    public function removeChanson(Chanson $chanson): self
    {
        if ($this->chansons->removeElement($chanson)) {
            // set the owning side to null (unless already changed)
            if ($chanson->getAlbum() === $this) {
                $chanson->setAlbum(null);
            }
        }

        return $this;
    }

    public function getAffiche(): ?string
    {
        return $this->Affiche;
    }

    public function setAffiche(?string $Affiche): self
    {
        $this->Affiche = $Affiche;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getAfficheFile(): ?File
    {
        return $this->AfficheFile;
    }

    /**
     * @param File|null|UploadedFile $AfficheFile
     */
    public function setAfficheFile(?File $AfficheFile = null): void
    {
        $this->AfficheFile = $AfficheFile;

        if(null !== $AfficheFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function __toString()
    {
        return $this->getNom();
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
