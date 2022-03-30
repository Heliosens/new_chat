<?php


class Dialogue
{
    private ?int $id;
    private ?string $sentence;
    private ?User $author;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Dialogue
     */
    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSentence(): ?string
    {
        return $this->sentence;
    }

    /**
     * @param string|null $sentence
     * @return Dialogue
     */
    public function setSentence(?string $sentence): self
    {
        $this->sentence = $sentence;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getAuthor(): ?User
    {
        return $this->author;
    }

    /**
     * @param User|null $author
     */
    public function setAuthor(?User $author): self
    {
        $this->author = $author;
        return $this;
    }

}