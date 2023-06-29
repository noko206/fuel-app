<?php

use Fuel\Core\Controller_Hybrid;
use Fuel\Core\Response;
use Fuel\Core\View;

class Controller_Base extends Controller_Hybrid
{
	/** @var string|View 型を指定するためにオーバーライド */
	public $template = 'layouts/template';

	/**
	 * before
	 *
	 * @return void
	 */
	public function before(): void
	{
		parent::before();

		$this->template->header = View::forge('layouts/header');
		$this->template->footer = View::forge('layouts/footer');
	}

	/**
	 * after
	 *
	 * @param Response $response
	 * @return Response
	 */
	public function after($response): Response
	{
		return parent::after($response);
	}
}
