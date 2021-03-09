<?php
    namespace App\Controllers;
    use App\Models\User;
    use App\Controllers\BaseController;
    use Laminas\Diactoros\Response\RedirectResponse;

    
    class AdminController extends BaseController {                                                                                 
        public function getIndex() {
            return $this->renderHTML('admin.twig');
        }
    }
?>