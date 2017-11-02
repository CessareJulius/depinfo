<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 */
class UsersController extends AppController
{
    public function index()
    {
        $this->paginate = [
            'limit' => 5,
        ];
        //$users = $this->Users->find('all');
        $users = $this->paginate($this->Users);
        //pj($users);
        //die();
        $this->set('users', $users);
    }

    public function edit($id)
    {
        echo "Editar usuario: ".$id;
        exit();
    }
}
