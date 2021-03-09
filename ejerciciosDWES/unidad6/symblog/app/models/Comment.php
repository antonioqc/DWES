<?php
namespace App\Models;

class Comment 
{
    private $id;
    private $blog_id;
    private $user;
    private $comment;
    private $approved;
    private $created;
    private $updated;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getBlog()
    {
        return $this->blog_id;
    }

    public function setBlog($blog_id)
    {
        $this->blog_id = $blog_id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function getApproved()
    {
        return $this->approved;
    }

    public function setApproved($approved)
    {
        $this->approved = $approved;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    public function guardaBD()
    {
        $this->query = "INSERT INTO comment(blog_id,user,comment) VALUES (:blog_id,:user,:comment)";
        $this->parametros["blog_id"] = $this->blog_id;
        $this->parametros["user"] = $this->user;
        $this->parametros["comment"] = $this->comment;

        $this->get_results_from_query();
        $this->mensaje = "SH agregado correctamente";
    }
}
