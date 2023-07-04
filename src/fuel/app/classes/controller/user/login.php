<?php

use Fuel\Core\View;

class Controller_User_Login extends Controller_User_Base
{
	/**
	 * ログインページ
	 *
	 * @return void
	 */
	public function get_index(): void
	{
		$this->template->set('main', View::forge('user/index'));
	}

	/**
	 * ログイン
	 *
	 * @return void
	 */
	public function post_index(): void
	{

	}
}
