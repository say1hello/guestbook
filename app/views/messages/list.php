<form action="" class="form-search form-inline pull-right" role="form" method="get">
	<div class="form-group">
		<input id="search" class="form-control" name="search" />
	</div>
	<button type="submit" class="btn btn-primary">Поиск</button>
</form>

<h1>Сообщения</h1>

<?php if ($this->search) {?>
	<p>По запросу '<?=$this->search?>' навйдено <?=$this->total;?> записей.</p>
<?php } ?>

<?php if ($this->total > 0) { ?>

<form action="" class="form-sort pull-right" role="form" method="get">
	<input name="sortby" type="hidden" value="desc"/>
	<input name="sortdir" type="hidden" value="create_time"/>
	<div class="form-group">
		<label for="sortby">Сортировать по:</label>
		<select id="sortby">
			<?php
			foreach($this->sortingValues as $key1 => $val1){
				foreach ($this->sortingDirections as $key2 => $val2) {?>
					<?php
					if ($this->sortby == $key1 && $this->sortdir == $key2) {
						$selected = ' selected';
					} else {
						$selected = '';
					}
					?>
					<option value="<?=$key1 .' ' . $key2?>"<?=$selected?>><?=$val1 .' ' . $val2?></option>
				<?php }
			}?>
		</select>
	</div>
</form>

<p>Показано <?=$this->count;?> из <?=$this->total;?> записей</p>
<table class="table table-bordered table-striped messages-list">
	<colgroup>
		<col width="20%"/>
		<col width="80%"/>
	</colgroup>
	<tbody>
<?php
	foreach ($this->messages as $message) {
		$actions = '';
		if (!empty($this->auth) && $this->auth['user_id'] == $message['user_id']) {
			$actions = '
				<ul class="actions list-inline pull-right">
					<li><a class="fa fa-pencil-square-o" href="/messages/edit/message_id/'. $message['message_id'] .'"></a></li>
					<li><a class="fa fa-trash-o" href="/messages/delete/message_id/'. $message['message_id'] .'"data-action="delete" ></a></li>
				</ul>
			';
		}
		$topPanel = '
			<div class="top-panel">
				' . $actions . '
				<div class="date">' . $message['create_time'] . '</div>
			</div>
		';

		$attach = '';
		if ($message['file_url']) {
			$attach = '<p>Прикрепленные файлы: <a href="' . $message['file_url'] . '" target="_blank">' . $message['file_name'] . '</a></p>';
		}

		$tr = '<tr>';
		$tr .= '<td>' . $message['userName'] . '<br>' . $message['userEmail'] . '</td>';
		$tr .= '<td>'
			. $topPanel
			. $message['body']
			. $attach
			. '</td>';
		$tr .= '</tr>';

		echo $tr;
	}
?>
	</tbody>
</table>

<?=$this->paginator;?>

<?php } ?>

<?=$this->form;?>