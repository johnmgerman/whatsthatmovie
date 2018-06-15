<table>
	<tr>
		<th>asdf</th>
		<th>Total Quotes</th>
		<th>Last Updated</th>
	</tr>
	<?php foreach ($sqss as $sqs): ?>
		<tr>
			<td><?= $this->Html->link($sqs->SQS_Type, ['action' => 'view', $sqs->SQS_ID]) ?>
			</td>
			<td><?= $sqs->SQS_TotalQuoteCount ?>
			</td>
			<td><?= $sqs->SQS_LastUpdated ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>