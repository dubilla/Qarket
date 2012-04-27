<table>
	<?php
		echo $this->Html->tableHeaders(array_keys($knownusers[0]['User']));

		foreach ($knownusers as $thisuser) {
			echo $this->Html->tableCells($thisuser['User']);
		}

	?>
</table>