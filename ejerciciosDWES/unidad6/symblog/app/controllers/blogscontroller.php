<?php
    namespace App\Controllers;
    use App\Models\Blog;
    use App\Controllers\BaseController;
    use Laminas\Diactoros\Response\HtmlResponse as HtmlResponse;
    use Respect\Validation\Validator as v;

    
    class BlogsController extends BaseController {                                                                                 
        public function getAddBlogAction($request) {
            $responseMessage = null;
            if ($request->getMethod()=='POST') {
                $postData = $request->getParsedBody();
                $blogValidator = v::key('title', v::stringType()->notEmpty())
                               ->key('description', v::stringType()->notEmpty())
                               ->key('tag', v::stringType()->notEmpty())
                               ->key('author', v::stringType()->notEmpty());
                
                try {
                    $blog = new Blog();
                    $blog->title = $postData['title'];
                    $blog->blog = $postData['description'];
                    $blog->tags = $postData['tag'];
                    $blog->author = $postData['author'];
    
                    $files = $request->getUploadedFiles();
                    $image = $files["image"];
                    if($image->getError()==UPLOAD_ERR_OK) {
                        $fileName = $image->getClientFilename();
                        $fileName = uniqid().$fileName;
                        $image->moveTo("img/$fileName");
                        $blog->image = $fileName;
                    }
                    $blog->save();
                    $responseMessage = "Saved";
                } catch(\Exception $e) {
                    $responseMessage = $e->getMessage();
                }

            }
            // include '..\views\addBlog.php';
            // return $this->renderHTML('addBlog.twig', ["blogs"=>Blog::all()]);
            return $this->renderHTML('addBlog.twig', ["responseMessage"=>$responseMessage]);
        }
    }
?>