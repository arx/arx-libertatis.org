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

$more_shown = false;

foreach($p->items as $item) {
	
	if($count >= $p->max_items):
		if(!$more_shown):
?>
<div class="navigate">
	<div class="next"><a href="<? url('p:news') ?>">older entries</a></div>
</div>
<?
		endif /* !$more_shown */;
		break;
	endif /* $count >= $p->max_items */;
	
	if(!isset($typed_counts[$item->type])) {
		$typed_counts[$item->type] = 0;
	}
	if(is_array($p->typed_max_items) && (!isset($p->typed_max_items[$item->type])
	   || $typed_counts[$item->type] >= $p->typed_max_items[$item->type])):
		if(!$more_shown):
?>
<div class="navigate">
	<div class="next"><a href="<? url('p:news') ?>">(more entries)</a></div>
</div>
<?
		endif /* !$more_shown */;
		$more_shown = true;
		continue;
	endif /* filtered out */;
	
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
	
	$more_shown = false;
	
	$typed_counts[$item->type]++;
	$count++;
}
