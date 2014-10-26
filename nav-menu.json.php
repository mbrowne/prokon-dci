<?php
ini_set('display_errors', 1);

//Loop through markdown files to automatically generate navigation menu

$excludeDirs = array('assets');

$customLinkTitles = array(
	//format:
	//filename => title
);

function buildNav(&$nav, $parentDir) {
	global $excludeDirs, $customLinkTitles;
	
	$gi = new GlobIterator( ($parentDir ? $parentDir.'/': '').'*.md');
	foreach ($gi as $filename => $file) {
		$basename = basename($filename, '.md');
		if ($basename=='index') continue;

		if (isset($customLinkTitles[$filename])) {
			$linkTitle = $customLinkTitles[$filename];
		}
		else $linkTitle = ucwords(str_replace('-', ' ', $basename));
		
		$nav[$linkTitle] = array(
			'url' => preg_replace('/.md$/', '', $filename)
		);
	}
	
	$di = new DirectoryIterator($parentDir ?: '.');
	foreach ($di as $fileInfo) {
		if (!$fileInfo->isDir()) continue;
		$dirname = $fileInfo->getFilename();
		if (strpos($dirname, '.') === 0) continue;
		if (in_array($dirname, $excludeDirs)) continue;
		
		$dirLinkTitle = isset($customLinkTitles[$dirname]) ?
			$customLinkTitles[$dirname]:
			ucwords(str_replace('-', ' ', $dirname));
		
		$subNav = array();	
		buildNav($subNav, ($parentDir ? $parentDir.'/': ''). $dirname);
		
		if (!empty($subNav)) {
			$nav[$dirLinkTitle] = array(
				'url' => $dirname,
				'children' => $subNav
			);
		}
	}
	
	return $nav;
}


$nav = array();
buildNav($nav, '');


//Additional nav links (and/or make manual changes to the auto-generated links)
//$nav['Database Diagram'] = array('url' => 'database-diagram.pdf', 'target'=>'_blank');

// var_dump($nav);
// exit;

header('Content-type: application/json');
echo json_encode($nav);