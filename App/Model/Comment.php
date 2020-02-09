<?php


namespace App\Model;



class Comment
{
    /**
     * @var int $id comment id
     */
    private $id;
    /**
     * @var string $title title comment
     */
    private $author;

    /**
     * @var string $chapo chapo comment
     */
    private $comment;

    /**
     * @var string $$comment description comment
     */
    private $post_id;

    /**
     * @return int
     */
    /**
     * @var string $date_creation comment date creation
     */
    private $comment_date;

    private $is_valid;

        public function __construct($datas = [])
    {
        if (!empty($datas)) {
            $this->hydrate($datas);
        }
    }

    public function hydrate($datas)
    {
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @param int $id
     * @return Comment
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
     * @return Comment
     */
    public function setAuthor(string $author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return Comment
     */
    public function setComment(string $comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostId(): string
    {
        return $this->post_id;
    }

    /**
     * @param string $post_id
     * @return Comment
     */
    public function setPostId(string $post_id)
    {
        $this->post_id = $post_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentDate()
    {
        return $this->comment_date;
    }

    /**
     * @param string $comment_date
     * @return Comment
     */
    public function setCommentDate(string $comment_date)
    {
        $this->comment_date = $comment_date;
        return $this;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->is_valid;
    }

    /**
     * @param bool $is_valid
     * @return Comment
     */
    public function setisValid(bool $is_valid)
    {
        $this->is_valid = $is_valid;
        return $this;
    }




}

