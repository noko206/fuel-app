<?php

use Fuel\Core\Controller_Hybrid;
use Fuel\Core\Response;
use Fuel\Core\View;

class Controller_User_Base extends Controller_Hybrid
{
	/** @var View テンプレート */
	public $template; // @phpstan-ignore-line

	/** @var string テンプレートのパス */
	protected string $template_path = 'user/layouts/template';

	/** @var string ヘッダーのパス */
	protected string $header_path = 'user/layouts/header';

	/** @var string フッターのパス */
	protected string $footer_path = 'user/layouts/footer';

	/**
	 * before
	 *
	 * @return void
	 */
	public function before(): void
	{
		parent::before();

		$this->template = View::forge($this->template_path);
		$this->template->set('header', View::forge($this->header_path));
		$this->template->set('footer', View::forge($this->footer_path));
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
