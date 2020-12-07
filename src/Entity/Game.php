<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GameRepository::class)
 */
class Game
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $synopsis;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $isbn;

    /**
     * @ORM\Column(type="integer")
     */
    private $playerNumberMin;

    /**
     * @ORM\Column(type="integer")
     */
    private $playerNumberMax;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duration;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ageMin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\ManyToOne(targetEntity=Editor::class)
     */
    private $editor;

    /**
     * @ORM\Column(type="integer")
     */
    private $types;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="games")
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="my_games")
     */
    private $users;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $note;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="game")
     */
    private $comment;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->comment = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(?string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getPlayerNumberMax(): ?int
    {
        return $this->playerNumberMax;
    }

    public function setPlayerNumberMax(int $playerNumberMax): self
    {
        $this->playerNumberMax = $playerNumberMax;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }


    public function getAgeMin(): ?int
    {
        return $this->ageMin;
    }

    public function setAgeMin(?int $ageMin): self
    {
        $this->ageMin = $ageMin;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getEditor(): ?Editor
    {
        return $this->editor;
    }

    public function setEditor(?Editor $editor): self
    {
        $this->editor = $editor;

        return $this;
    }

    public function getTypes(): ?int
    {
        return $this->types;
    }

    public function setTypes(int $types): self
    {
        $this->types = $types;

        return $this;
    }


    public function getPlayerNumberMin(): ?int
    {
        return $this->playerNumberMin;
    }

    public function setPlayerNumberMin(int $playerNumberMin): self
    {
        $this->playerNumberMin = $playerNumberMin;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addMyGame($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeMyGame($this);
        }

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComment(): Collection
    {
        return $this->comment;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comment->contains($comment)) {
            $this->comment[] = $comment;
            $comment->setGame($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comment->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getGame() === $this) {
                $comment->setGame(null);
            }
        }

        return $this;
    }
}
