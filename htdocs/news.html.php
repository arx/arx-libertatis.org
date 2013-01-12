<?
// News list

$p->param('max_items', 'Maximum number of news items', 10000000);
$p->param('typed_max_items', 'Maximum number of items for each news class', 'foobar');
$p->param('detail', 'Detail level', [
	'detail', 'synopsis','synopsis', 'synopsis', 'synopsis', 'synopsis', 'title'
]);
$p->param('typed_detail', 'Forced detail for each news class', [ ]);

$p->inherit('newsframe');
$p->title = 'News';
$p->import('newslist');

$count = 0;
$typed_counts = [ ];

$skipped_items = 0;

$latest = [ ];

foreach($p->items as $item) {
	
	if(!isset($typed_counts[$item->type])) {
		$typed_counts[$item->type] = 0;
	}
	if(is_array($p->typed_max_items) && (!isset($p->typed_max_items[$item->type])
	   || $typed_counts[$item->type] >= $p->typed_max_items[$item->type])):
		if(isset($p->typed_max_items[$item->type])) {
			$skipped_items++;
		}
		continue;
	endif /* filtered out */;
	
	if($count >= $p->max_items):
		$skipped_items++;
		break;
	endif /* $count >= $p->max_items */;
	
	// Insert a placeholder for skipped items
	if($count > 0 && $skipped_items > 0):
?>
<div class="navigate">
	<div class="more"><a href="<?= url('p:news') ?>">(more entries)</a></div>
</div>
<?
	endif /* $count > 0 && $skipped_items > 0 */;
	$skipped_items = 0;
	
	// Determine the level of detail for this news item
	if(isset($p->typed_detail[$item->type])) {
		if(is_array($p->typed_detail[$item->type])) {
			if($typed_counts[$item->type] < count($p->typed_detail[$item->type])) {
				$detail = $p->typed_detail[$item->type][$typed_counts[$item->type]];
			} else if(count($p->typed_detail[$item->type]) > 0) {
				$detail = $p->typed_detail[$item->type][count($p->typed_detail[$item->type]) - 1];
			} else {
				error("bad typed_detail parameter");
			}
		} else {
			$detail = $p->typed_detail[$item->type];
		}
	} else if(is_array($p->detail)) {
		if($count < count($p->detail)) {
			$detail = $p->detail[$count];
		} else if(count($p->detail) > 0) {
			$detail = $p->detail[count($p->detail) - 1];
		} else {
			error("bad detail parameter");
		}
	} else {
		$detail = $p->detail;
	}
	
	inject_page($item->page, [ 'detail' => $detail ]);
	
	$typed_counts[$item->type]++;
	$count++;
}

// Add a link to the remaining items
if($count > 0 && $skipped_items > 0):
?>
<div class="navigate">
	<div class="more"><a href="<?= url('p:news') ?>">older entries</a></div>
</div>
<?
endif /* $count > 0 && $skipped_items > 0 */;
