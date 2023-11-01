<?php

namespace Controller;

defined('ROOTPATH') or exit('Access Denied!');

use \Core\Pager;
use \Model\Image;
use \Model\Photo;

/**
 * Photos class
 */
class Photos
{
    use MainController;

    public function index()
    {
        $photo = new Photo;

        $limit = 24;
        $pager = new Pager($limit);
        $offset = $pager->offset;

        $photo->limit = $limit;
        $photo->offset = $offset;

        $data['rows'] = $photo->findAll();
        $data['image'] = new Image;
        $data['pager'] = $pager;

        $this->view('photos', $data);
    }

}
