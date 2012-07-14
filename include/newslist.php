<?
// Reverse chronological list of news items

// TODO cache this list somehow

$options = [
	'format' => '/dev/null'
];

$items = array_merge(
	compile_all('news/*', $options),
	compile_all('releases/*', $options)
);

usort($items, function ($a, $b) {
	return $b->time - $a->time;
});

$p->items = $items;
