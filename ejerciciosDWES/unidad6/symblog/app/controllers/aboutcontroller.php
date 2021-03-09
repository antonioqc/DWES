<?php
    namespace App\Controllers;
    use App\Models\Blog;

    class AboutController {                                                                                 
        public function getAboutAction() {
            // echo "AboutAction";
            $blogs = Blog::all();
            include '..\about.php';
        }
    }
?>