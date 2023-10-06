<?php

namespace Model;

defined('ROOTPATH') or exit('Access Denied!');

/**
 * Photo class
 */
class Photo
{

    use Model;

    protected $table = 'photos';
    protected $primaryKey = 'id';
    protected $loginUniqueColumn = 'email';

    protected $allowedColumns = [

        'username',
        'email',
        'password',
    ];

    /*****************************
     *     rules include:
    required
    alpha
    email
    numeric
    unique
    symbol
    longer_than_8_chars
    alpha_numeric_symbol
    alpha_numeric
    alpha_symbol
     *
     ****************************/
    protected $validationRules = [

        'title' => [
            'alpha_numeric_symbol',
            'required',
        ],
    ];

}
