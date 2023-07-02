<?php

namespace Fuel\Migrations;

use \Fuel\Core\DBUtil;

class Create_boards
{
	const TABLE_NAME = 'boards';

	public function up()
	{
		DBUtil::create_table(self::TABLE_NAME, [
			'id' => ['constraint' => 11, 'type' => 'int', 'unsigned' => true, 'auto_increment' => true],
			'title' => ['constraint' => 255, 'type' => 'varchar'],
			'description' => ['constraint' => 255, 'type' => 'varchar'],
			'created_at' => ['type' => 'datetime'],
			'updated_at' => ['type' => 'datetime'],
		], ['id']);
	}

	public function down()
	{
		DBUtil::drop_table(self::TABLE_NAME);
	}
}
