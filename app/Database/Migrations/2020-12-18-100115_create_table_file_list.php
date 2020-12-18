<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableFileList extends Migration
{
	public function up()
	{
		$this->forge->addField([
                        'id'             => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                        'file_name' => ['type' => 'varchar', 'constraint' => 150, 'null' => true],
                        'is_deleted' => ['type' => 'int', 'default' => 0],
                ]);
                $this->forge->addKey('id', true);
                $this->forge->createTable('file_list');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('file_list', true);
	}
}
