<?php


namespace App\Model;


class Comment
{

    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $author_id;
    /**
     * @var
     */
    private $comment;
    /**
     * @var
     */
    private $post_id;
    /**
     * @var
     */
    private $comment_date;
    /**
     * @var
     */
    private $is_valid;
    /**
     * @var
     */
    private $username;

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
     * @return int
     */
    public function getauthor_id(): int
    {
        return $this->author_id;
    }

    /**
     * @param int $author
     * @return Comment
     */
    public function setAuthor_id(int $author)
    {
        $this->author_id = $author;
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
    public function getPostId(): int
    {
        return $this->post_id;
    }

    /**
     * @param string $post_id
     * @return Comment
     */
    public function setPostId(int $post_id)
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
     * @return mixed
     */
    public function getIsValid()
    {
        return $this->is_valid;
    }

    /**
     * @param mixed $is_valid
     * @return Comment
     */
    public function setIsValid($is_valid)
    {
        $this->is_valid = $is_valid;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return Comment
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }


}

