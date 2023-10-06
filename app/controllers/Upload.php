<?php

namespace Controller;

defined('ROOTPATH') or exit('Access Denied!');
use \Core\Request;
use \Core\Session;
use \Model\Photo;

/**
 * Upload class
 */
class Upload
{
    use MainController;

    public function index()
    {
        $data['title'] = "upload";

        $req = new Request;
        $ses = new Session;
        $photo = new Photo;

        if ($req->posted()) {
            $data = $req->post();

            if ($photo->validate($data)) {

                $data['date_created'] = date('Y-m-d H:i:s');
                $data['user_id'] = $ses->user('id');
                $data['image'] = "";

                $files = $req->files();
                if (!empty($files['image']['name'])) {

                    $folder = 'uploads/';
                    if (!file_exists($folder)) {
                        mkdir($folder, 0777, true);
                        file_put_contents($folder . 'index.php', "");
                    }

                    $allowed = ['image/jpg', 'image/jpeg', 'image/png', 'image/webp'];

                    if (in_array($files['image']['type'], $allowed)) {
                        $data['image'] = $folder . time() . $files['image']['name'];
                        move_uploaded_file($files['image']['tmp_name'], $data['image']);
                        $image = new \Model\Image;
                        $image->resize($data['image'], 1000);
                    }

                    $photo->insert($data);
                    redirect('photos');
                }
            }
            $data['errors'] = $photo->errors;
        }
        $data['photo'] = $photo;
        $this->view('upload', $data);
    }

}
