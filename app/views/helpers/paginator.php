<div class="paginator">

	<?php if ($this->prevPage > 0 && $this->prevPage < $this->currentPage) {?>
	<a href="?<?=$this->queryString;?><?=$this->pageParamName;?>=<?=$this->firstPage;?>" class="pull-left"><i class="fa fa-fast-backward"></i> Первая</a>
	<a href="?<?=$this->queryString;?><?=$this->pageParamName;?>=<?=$this->prevPage;?>"><i class="fa fa-backward"></i> Назад</a>
	<?php } ?>

	<span>Страница <?=$this->currentPage?> из <?=$this->totalPages?></span>

	<?php if ($this->currentPage < $this->totalPages) {?>
	<a href="?<?=$this->queryString;?><?=$this->pageParamName;?>=<?=$this->nextPage;?>">Вперед <i class="fa fa-forward"></i></a>
	<a href="?<?=$this->queryString;?><?=$this->pageParamName;?>=<?=$this->lastPage;?>" class="pull-right">Последняя <i class="fa fa-fast-forward"></i></a>
	<?php } ?>

</div>