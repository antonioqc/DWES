<?php
    namespace App\Controllers;
    use App\Models\Blog;

    class ContactController {                                                                                 
        public function getContactAction() {
            // echo "ContactAction";
            $blogs = Blog::all();
            include '..\contact.php';
        }
    }
?>