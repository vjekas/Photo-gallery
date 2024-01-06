<?php

namespace Controller;

defined('ROOTPATH') or exit('Access Denied!');

use \Core\Request;
use \Core\Session;
use \Model\Like;

/**
 * ajax class
 */
class Ajax
{
    use MainController;

    public function index()
    {
        $req = new Request;
        $ses = new Session;
        $like = new Like;

        $info = [];
        if (!$ses->is_logged_in()) {
            echo "Please login to like";
            die;
        }

        if ($req->posted()) {
            $post_data = $req->post();
            $info['data_type'] = $post_data['data_type'];

            $post_data['user_id'] = $ses->user('id');

            if ($post_data['data_type'] == 'like') {

                if ($row = $like->first(['user_id' => $post_data['user_id'], 'post_id' => $post_data['post_id']])) {

                    $disabled = 1;
                    $info['liked'] = false;
                    if ($row->disabled == 1) {
                        $disabled = 0;
                        $info['liked'] = true;
                    }
                    $like->update($row->id, ['disabled' => $disabled]);
                } else {
                    $post_data['disabled'] = 0;
                    $like->insert($post_data);

                    $info['liked'] = true;
                }
                $info['likes'] = $like->getLikes($post_data['post_id']);
            }
        }
        echo json_encode($info);
    }
}
