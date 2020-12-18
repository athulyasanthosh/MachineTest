<?php

namespace App\Models;

use CodeIgniter\Model;

class FileListModel extends Model
{
    protected $table      = 'file_list';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    
    protected $allowedFields = [
        'file_name', 'is_deleted','created_at','deleted_at'
    ];    

   
    protected $validationRules = [];

    protected $dynamicRules = [
        'registration' => [
            'file_name'    => 'uploaded[file_name]|max_size[file_name,2048]|ext_in[file_name,txt,doc,docx,png,jpeg,jpg,gif]',
        ]
        
    ];

    protected $validationMessages = [];

    protected $skipValidation = false;


    //--------------------------------------------------------------------

    /**
     * Retrieves validation rule
     */
    public function getRule(string $rule)
    {
        return $this->dynamicRules[$rule];
    }

}
