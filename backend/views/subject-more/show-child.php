<table class="table table-default">
	<tbody>
	<tr>
		<th>序号</th>
		<th>标题</th>
		<th>类型</th>
		<th>题干</th>
		<th>答案</th>
		<th>难度级别</th>
	</tr>
	<?php
	$select_list = \backend\models\ChildSelect::getChildSelect($id);
	$subjective_list = \backend\models\ChildSubjective::getChildSubjective($id);
	$list=\yii\helpers\ArrayHelper::merge($select_list,$subjective_list);
	\yii\helpers\ArrayHelper::multisort($list,['sort'],[SORT_ASC]);
	foreach ($list as $key => $value) {
		?>
		<tr>
			<td><?= $value['sort'] ?></td>
			<td><?= $value['title'] ?></td>
			<td><?= $value['type'] ?></td>
			<td><?= $value['content'] ?></td>
			<td><?= $value['result'] ?></td>
			<td><?= $value['level'] ?></td>
		
		</tr>
		<?php
	}
	?>
	</tbody>
</table>