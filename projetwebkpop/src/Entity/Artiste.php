<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArtisteRepository;
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
 * @ORM\Entity(repositoryClass=ArtisteRepository::class)
 */
class Artiste
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ({"read:groupe"})
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $Age;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nationalite;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Histoire;

    /**
     * @ORM\ManyToOne(targetEntity=Groupe::class, inversedBy="artistes")
     */
    private $groupe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

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

    public function getAge(): ?int
    {
        return $this->Age;
    }

    public function setAge(int $Age): self
    {
        $this->Age = $Age;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->Nationalite;
    }

    public function setNationalite(string $Nationalite): self
    {
        $this->Nationalite = $Nationalite;

        return $this;
    }

    public function getHistoire(): ?string
    {
        return $this->Histoire;
    }

    public function setHistoire(?string $Histoire): self
    {
        $this->Histoire = $Histoire;

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

    public function __toString()
    {
        return $this->nom;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

}
