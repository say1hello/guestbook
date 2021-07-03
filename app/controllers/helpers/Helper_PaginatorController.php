<?php
/**
 * Хелпер постраничной навигации
 */

class Helper_PaginatorController
{
	/**
	 * @var int $totalPages         кол-во страниц
	 * @var int $currentPage        номер текущей страницы
	 * @var string $params          параметры из query string
	 * @var string $pageParamName   имя параметра номера страницы
	 */
	public  $totalPages,
			$currentPage,
			$params,
			$pageParamName;

	/**
	 * @param int $totalPages        кол-во страниц
	 * @param string $pageParamName  имя параметра номера страницы
	 *
	 * @return void
	 */
	public function __construct($totalPages, $pageParamName = 'page') {
		$this->totalPages = $totalPages;
		$this->pageParamName = $pageParamName;

		$fc = FrontController::getInstance();

		$this->params = $fc->getParams();

		$page = Validate::cleanNumber($fc->getParam($this->pageParamName));
		$this->currentPage = ($page) ? $page : 1;

		if ($this->currentPage > $this->totalPages) {
			$this->currentPage = $this->totalPages;
		}
	}

	/**
	 * Генерирует html код пагинации
	 *
	 * @return string html код пагинации
	 */
	public function getLinks() {
		if ($this->totalPages < 2) {
			return false;
		}

		$view = new ViewModel();

		$view->totalPages = $this->totalPages;
		$view->currentPage = $this->currentPage;
		$view->prevPage = $this->currentPage - 1;
		$view->nextPage = $this->currentPage + 1;
		$view->firstPage = 1;
		$view->lastPage = $this->totalPages;
		$view->pageParamName = $this->pageParamName;

		if (isset($this->params['page'])) {
			unset($this->params['page']);
		}

		$view->queryString = '';
		if (!empty($this->params)) {
			foreach ($this->params as $paramName => $paramValue) {
				$view->queryString .= $paramName . '=' . $paramValue . '&';
			}
		}

		return $view->render('../views/helpers/paginator.php');
	}
}