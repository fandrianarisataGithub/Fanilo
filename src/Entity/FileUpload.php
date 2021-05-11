<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\FileUploadRepository;

/**
 * @ORM\Entity(repositoryClass=FileUploadRepository::class)
 */
class FileUpload
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_file;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $max_size;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="files")
     */
    private $article;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getTypeFile(): ?string
    {
        return $this->type_file;
    }

    public function setTypeFile(string $type_file): self
    {
        $this->type_file = $type_file;

        return $this;
    }

    public function getMaxSize(): ?int
    {
        return $this->max_size;
    }

    public function setMaxSize(?int $max_size): self
    {
        $this->max_size = $max_size;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }
}
