<?php

use Orm\Model;

class Model_Board extends Model
{
	/** @var string テーブル名 */
	protected static $_table_name = 'boards';

	/** @var string[] プライマリーキー */
	protected static $_primary_key = ['id'];

	/** @var array<string, array<string, mixed>> プロパティ */
	protected static $_properties = [
		'id' => [
			'data_type' => 'int',
			'validation' => [
				'required',
			],
		],
		'title' => [
			'data_type' => 'varchar',
			'validation' => [
				'required',
				'max_length' => [60],
			],
		],
		'description' => [
			'data_type' => 'varchar',
			'validation' => [
				'required',
				'max_length' => [200],
			],
		],
		'created_at' => [
			'date_type' => 'datetime',
		],
		'updated_at' => [
			'date_type' => 'datetime',
		],
	];
}
