<div>
	<p>掲示板一覧ページです。</p>
</div>
<div>
	<?php foreach ($boards as $board) : ?>
		<div>
			<p>
				<?php echo $board->id; ?><br>
				<?php echo $board->title; ?><br>
				<?php echo $board->description; ?><br>
				<?php echo $board->created_at; ?><br>
				<?php echo $board->updated_at; ?>
			</p>
		</div>
	<?php endforeach; ?>
</div>