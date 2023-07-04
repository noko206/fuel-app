<?php

use Fuel\Core\View;

class Controller_User_Index extends Controller_User_Base
{
	/**
	 * TOPページ
	 *
	 * @return void
	 */
	public function get_index(): void
	{
		$this->template->set('main', View::forge('user/index'));
	}
}
