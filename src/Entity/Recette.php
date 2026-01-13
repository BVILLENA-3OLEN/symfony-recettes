<?php

namespace App\Entity;

use App\Entity\Enum\NiveauRecetteEnum;
use App\Repository\RecetteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecetteRepository::class)]
class Recette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(nullable: true, enumType: NiveauRecetteEnum::class)]
    private ?NiveauRecetteEnum $niveau = null;

    #[ORM\Column(nullable: true)]
    private ?int $nombrePersonnes = null;

    #[ORM\Column]
    private ?int $tempsPreparation = null;

    #[ORM\Column(nullable: true)]
    private ?int $tempsCuisson = null;

    #[ORM\Column(nullable: true)]
    private ?int $tempsRepos = null;

    #[ORM\Column(nullable: true)]
    private ?string $image = null;

    #[ORM\OneToMany(targetEntity: IngredientRecette::class, mappedBy: 'recette', orphanRemoval: true)]
    private Collection $ingredientRecettes;

    /**
     * @var Collection<int, Categorie>
     */
    #[ORM\ManyToMany(targetEntity: Categorie::class, mappedBy: 'recettes')]
    private Collection $categories;

    /**
     * @var Collection<int, EtapeRecette>
     */
    #[ORM\OneToMany(targetEntity: EtapeRecette::class, mappedBy: 'recette', orphanRemoval: true)]
    private Collection $etapes;

    public function __construct()
    {
        $this->ingredientRecettes = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->etapes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNiveau(): ?NiveauRecetteEnum
    {
        return $this->niveau;
    }

    public function setNiveau(?NiveauRecetteEnum $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getNombrePersonnes(): ?int
    {
        return $this->nombrePersonnes;
    }

    public function setNombrePersonnes(?int $nombrePersonnes): void
    {
        $this->nombrePersonnes = $nombrePersonnes;
    }

    public function getTempsPreparation(): ?int
    {
        return $this->tempsPreparation;
    }

    public function setTempsPreparation(int $tempsPreparation): static
    {
        $this->tempsPreparation = $tempsPreparation;

        return $this;
    }

    public function getTempsCuisson(): ?int
    {
        return $this->tempsCuisson;
    }

    public function setTempsCuisson(int $tempsCuisson): static
    {
        $this->tempsCuisson = $tempsCuisson;

        return $this;
    }

    public function getTempsRepos(): ?int
    {
        return $this->tempsRepos;
    }

    public function setTempsRepos(?int $tempsRepos): void
    {
        $this->tempsRepos = $tempsRepos;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return Collection<int, IngredientRecette>
     */
    public function getIngredientRecettes(): Collection
    {
        return $this->ingredientRecettes;
    }

    public function addIngredientRecette(IngredientRecette $ingredientRecette): static
    {
        if (!$this->ingredientRecettes->contains($ingredientRecette)) {
            $this->ingredientRecettes->add($ingredientRecette);
            $ingredientRecette->setRecette($this);
        }

        return $this;
    }

    public function removeIngredientRecette(IngredientRecette $ingredientRecette): static
    {
        if ($this->ingredientRecettes->removeElement($ingredientRecette)) {
            // set the owning side to null (unless already changed)
            if ($ingredientRecette->getRecette() === $this) {
                $ingredientRecette->setRecette(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): static
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
        }

        return $this;
    }

    public function removeCategory(Categorie $category): static
    {
        $this->categories->removeElement($category);

        return $this;
    }

    /**
     * @return Collection<int, EtapeRecette>
     */
    public function getEtapes(): Collection
    {
        return $this->etapes;
    }

    public function addEtape(EtapeRecette $etape): static
    {
        if (!$this->etapes->contains($etape)) {
            $this->etapes->add($etape);
            $etape->setRecette($this);
        }

        return $this;
    }

    public function removeEtape(EtapeRecette $etape): static
    {
        if ($this->etapes->removeElement($etape)) {
            // set the owning side to null (unless already changed)
            if ($etape->getRecette() === $this) {
                $etape->setRecette(null);
            }
        }

        return $this;
    }
}
