<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    // //Construcción del modelo singleton.
    // private static $instancia;
    // public static function getInstancia()
    // {
    //     if (!isset(self::$instancia)) { //estamos accediendo a una propiedad estatica de la clase, por eso los dos puntos.
    //         $miclase = __CLASS__; //te devuelve el nombre de la clase
    //         self::$instancia = new $miclase;
    //     }
    //     return self::$instancia;
    // }

    // private $id;
    // private $title;
    // private $author;
    // private $blog;
    // private $image;
    // private $tags;
    // private $created;
    // private $updated;
    // private $comments = array();

    // //     public function __construct($id, $title, $author, $blog, $image, $tags, $created, $updated) {
    // //     // $this->_id = $id;
    // //     // $this->_title = $title;
    // //     // $this->_author = $author;
    // //     // $this->_blog = $blog;
    // //     // $this->_image = $image;
    // //     // $this->_tags = $tags;
    // //     $this->_created = $created;
    // //     $this->_updated = $updated;
    // // }

    // public function getId()
    // {
    //     return $this->id;
    // }

    // public function setId($id)
    // {
    //     $this->id = $id;
    // }

    // public function getTitle()
    // {
    //     return $this->title;
    // }

    // public function setTitle($title)
    // {
    //     $this->title = $title;
    // }

    // public function getAuthor()
    // {
    //     return $this->author;
    // }

    // public function setAuthor($author)
    // {
    //     $this->author = $author;
    // }

    // public function getBlog()
    // {
    //     return $this->blog;
    // }

    // public function setBlog($blog)
    // {
    //     $this->blog = $blog;
    // }

    // public function getImage()
    // {
    //     return $this->image;
    // }

    // public function setImage($image)
    // {
    //     $this->image = $image;
    // }

    // public function getTags()
    // {
    //     return $this->tags;
    // }

    // public function setTags($tags)
    // {
    //     $this->tags = $tags;
    // }

    // public function getCreated()
    // {
    //     return $this->created;
    // }

    // public function setCreated($created)
    // {
    //     $this->created = $created;
    // }

    // public function getUpdated()
    // {
    //     return $this->updated;
    // }

    // public function setUpdated($updated)
    // {
    //     $this->updated = $updated;
    // }

    // public function addComment($comment)
    // {
    //     array_push($this->comments, $comment);
    // }

    // public function getNumComments()
    // {
    //     return sizeOf($this->comments);
    // }


    // /**
    //  * Insert
    //  */
    // public function guardaBD()
    // {
    //     $this->query = "INSERT INTO blog(title,author,blog,image,tags) VALUES (:title,:author,:blog,:image,:tags)";
    //     // $this->parametros["id"] = $this->id;
    //     $this->parametros["title"] = $this->title;
    //     $this->parametros["author"] = $this->title;
    //     $this->parametros["blog"] = $this->blog;
    //     $this->parametros["image"] = $this->image;
    //     $this->parametros["tags"] = $this->tags;
    //     // $this->parametros["created"] = $this->created;
    //     // $this->parametros["updated"] = $this->updated;
    //     $this->get_results_from_query();
    //     $this->mensaje = "SH agregado correctamente";
    // }
}
