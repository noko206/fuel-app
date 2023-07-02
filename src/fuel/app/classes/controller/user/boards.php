<?php

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
		$this->template->set('main', View::forge('user/boards/index'));
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
	public function post_store(): void
	{
		// POST値を取得
		$post = Input::post();

		// バリデーション
		$validation = Validation::forge();
		$validation->add_field('title', 'title', 'required|max_length[60]');
		$validation->add_field('description', 'description', 'required|max_length[200]');

		// バリデーションに失敗したら新規掲示板作成ページに戻る
		if (!$validation->run()) {
			$data = [
				'title'       => $post['title'] ?? '',
				'description' => $post['description'] ?? '',
				'errors'      => $validation->error(),
			];
			$this->template->set('main', View::forge('user/boards/create', $data));
			return;
		}

		// 新規掲示板をDBに登録
		$board = Model_Board::forge();
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

		$this->template->set('main', View::forge('user/boards/store', $data));
	}
}
