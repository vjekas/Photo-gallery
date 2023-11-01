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
    protected $loginUniqueColumn = 'id';

    protected $allowedColumns = [

        'user_id',
        'image',
        'title',
        'date_created',
        'date_updated',
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
    protected $onInsertValidationRules = [

        'title' => [
            'alpha_numeric_symbol',
            'required',
        ],
    ];

    protected $onUpdateValidationRules = [

        'title' => [
            'alpha_numeric_symbol',
            'required',
        ],
    ];

}
