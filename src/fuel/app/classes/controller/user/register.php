<?php

use Fuel\Core\View;

class Controller_User_Register extends Controller_User_Base
{
	/**
	 * 新規会員登録ページ
	 *
	 * @return void
	 */
	public function get_index(): void
	{
		$this->template->set('main', View::forge('user/register'));
	}

	/**
	 * 新規会員登録
	 *
	 * @return void
	 */
	public function post_index(): void
	{
		//
	}
}
