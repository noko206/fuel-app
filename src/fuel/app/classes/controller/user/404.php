<?php

use Fuel\Core\View;

class Controller_User_404 extends Controller_User_Base
{
	/**
	 * 404ページ
	 *
	 * @return void
	 */
	public function action_index(): void
	{
		$this->template->set('main', View::forge('user/404'));
	}
}
