<?php


namespace App\Entity;


class Post
{
    /**
     * @var int $id post id
     */
    public $id;
    /**
     * @var string $title title post
     */
    public $title;

    /**
     * @var string $chapo chapo post
     */
    public $chapo;

    /**
     * @var string $description description post
     */
    public $description;

    /**
     * @var string $author author post
     */
    public $author;

    /**
     * @var string $date_creation post date creation
     */
    public $date_creation;

    /**
     * @var string $date_update post date update
     */
    public $date_update;

    public function __construct($datas = [])
    {
        if (!empty($datas)) {
            $this->hydrate($datas);
        }
    }

    public function hydrate($donnees)
    {

        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Post
     */
    public function setId(int $id): Post
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Post
     */
    public function setTitle(string $title): Post
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getChapo(): string
    {
        return $this->chapo;
    }

    /**
     * @param string $chapo
     * @return Post
     */
    public function setChapo(string $chapo): Post
    {
        $this->chapo = $chapo;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Post
     */
    public function setDescription(string $description): Post
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return Post
     */
    public function setAuthor(string $author): Post
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateCreation(): string
    {
        return $this->date_creation;
    }

    /**
     * @param string $date_creation
     * @return Post
     */
    public function setDateCreation(string $date_creation): Post
    {
        $this->date_creation = $date_creation;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateUpdate(): string
    {
        return $this->date_update;
    }

    /**
     * @param string $date_update
     * @return Post
     */
    public function setDateUpdate(string $date_update): Post
    {
        $this->date_update = $date_update;
        return $this;
    }


}
