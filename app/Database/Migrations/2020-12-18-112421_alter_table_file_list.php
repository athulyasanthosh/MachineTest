<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableFileList extends Migration
{
	public function up()
	{
		$fields = [
                'created_at' => [
                        'type' => 'DATETIME',
                        'null' => true
                ],
                'deleted_at' => [
                        'type' => 'DATETIME',
                        'null' => true
                ],
        ];

        $this->forge->addColumn('file_list', $fields);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
