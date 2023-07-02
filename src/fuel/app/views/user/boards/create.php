<div>
	<p>新規掲示板作成ページです。</p>
</div>
<div>
	<form action="/boards/store" method="post">
		<dl>
			<dt>タイトル</dt>
			<dd><input type="text" name="title"></dd>
			<dt>説明</dt>
			<dd><textarea name="description"></textarea></dd>
		</dl>
		<button type="submit" name="submit">作成</button>
	</form>
</div>