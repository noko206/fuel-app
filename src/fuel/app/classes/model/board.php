<?php

use Orm\Model;

class Model_Board extends Model
{
	protected static $_table_name = 'boards';

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
			'validation' => [
				'required',
			],
		],
		'updated_at' => [
			'date_type' => 'datetime',
			'validation' => [
				'required',
			],
		],
	];

	protected static $_primary_key = ['id'];
}
