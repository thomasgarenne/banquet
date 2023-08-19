<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $slug = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'categories')]
    private ?self $parent = null;

    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: self::class)]
    private Collection $categories;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Wines::class)]
    private Collection $wines;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Plates::class)]
    private Collection $plates;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->wines = new ArrayCollection();
        $this->plates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): static
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(self $category): static
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
            $category->setParent($this);
        }

        return $this;
    }

    public function removeCategory(self $category): static
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getParent() === $this) {
                $category->setParent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Wines>
     */
    public function getWines(): Collection
    {
        return $this->wines;
    }

    public function addWine(Wines $wine): static
    {
        if (!$this->wines->contains($wine)) {
            $this->wines->add($wine);
            $wine->setCategory($this);
        }

        return $this;
    }

    public function removeWine(Wines $wine): static
    {
        if ($this->wines->removeElement($wine)) {
            // set the owning side to null (unless already changed)
            if ($wine->getCategory() === $this) {
                $wine->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Plates>
     */
    public function getPlates(): Collection
    {
        return $this->plates;
    }

    public function addPlate(Plates $plate): static
    {
        if (!$this->plates->contains($plate)) {
            $this->plates->add($plate);
            $plate->setCategory($this);
        }

        return $this;
    }

    public function removePlate(Plates $plate): static
    {
        if ($this->plates->removeElement($plate)) {
            // set the owning side to null (unless already changed)
            if ($plate->getCategory() === $this) {
                $plate->setCategory(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
