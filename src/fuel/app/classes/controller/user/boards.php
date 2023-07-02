<?php

use Fuel\Core\Fieldset;
use Fuel\Core\Input;
use Fuel\Core\Validation;
use Fuel\Core\View;

class Controller_User_Boards extends Controller_User_Base
{
	/**
	 * 掲示板一覧ページ
	 *
	 * @return void
	 */
	public function get_index(): void
	{
		// 掲示板一覧を取得
		$boards = Model_Board::forge()->find('all', [
			'order_by' => ['created_at' => 'desc'],
		]);

		// Viewに渡すデータ
		$data = [
			'boards' => $boards,
		];

		$this->template->set('main', View::forge('user/boards/index', (object)$data));
	}

	/**
	 * 新規掲示板作成ページ
	 *
	 * @return void
	 */
	public function get_create(): void
	{
		$this->template->set('main', View::forge('user/boards/create'));
	}

	/**
	 * 新規掲示板作成
	 *
	 * @return void
	 */
	public function post_create(): void
	{
		// POST値を取得
		/** @var array<string, string> */
		$post = Input::forge()->post();

		// バリデーション
		$board  = Model_Board::forge();
		$fields = Fieldset::forge()->add_model($board);

		// バリデーションに失敗したら新規掲示板作成ページに戻る
		if (!$fields->validation()->run()) {
			$data = [
				'title'       => $post['title'] ?? '',
				'description' => $post['description'] ?? '',
				'errors'      => $fields->validation()->error(),
			];
			$this->template->set('main', View::forge('user/boards/create', (object)$data));
			return;
		}

		// 新規掲示板をDBに登録
		$now = (new DateTime)->format('Y-m-d H:i:s');

		$insert_data = [
			'title'       => $post['title'],
			'description' => $post['description'],
			'created_at'  => $now,
			'updated_at'  => $now,
		];

		$board->set($insert_data)->save();

		// Viewに渡すデータ
		$data = [
			'board_id' => $board->id,
		];

		$this->template->set('main', View::forge('user/boards/store', (object)$data));
	}
}
