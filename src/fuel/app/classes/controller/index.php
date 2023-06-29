<?php

use Fuel\Core\View;

class Controller_Index extends Controller_Base
{
	/**
	 * TOPページ
	 *
	 * @return void
	 */
	public function action_index(): void
	{
		$this->template->main = View::forge('index');
	}
}
