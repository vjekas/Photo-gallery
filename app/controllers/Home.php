<?php

namespace Controller;

defined('ROOTPATH') or exit('Access Denied!');

use \Model\Image;
use \Model\Photo;

/**
 * home class
 */
class Home
{
    use MainController;

    public function index()
    {
        $data['title'] = "Home";

        $photo = new Photo();

        $photo->limit = 12;
        $data['rows'] = $photo->findAll();
        $data['image'] = new Image;

        $this->view('home', $data);
    }

}
