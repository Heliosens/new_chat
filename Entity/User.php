<?php


class User
{
    private ?int $id = null;
    private string $pseudo;
    private ?int $on = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return User
     */
    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     * @return User
     */
    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getOn(): ?int
    {
        return $this->on;
    }

    /**
     * @param int|null $on
     */
    public function setOn(?int $on): self
    {
        $this->on = $on;
        return $this;
    }

}