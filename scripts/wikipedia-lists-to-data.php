<?php
/* Get US newspapers from Wikipedia lists by state (tsv), write to file.
 *
 * Built for a Wikkicred/Iffy.news project:
 * @see https://misinfocon.com/turning-wikimedia-into-a-news-site-credibility-tool-422dbf28fdec
 * @see https://github.com/hearvox/wiki-media-cred/tree/main
 *
 * Parse webage using Simple HTML DOM library
 * @see https://simplehtmldom.sourceforge.io/docs/1.9/manual/finding-html-elements/
 *
 */

/* IMPORTANT:
 * 1. Enter path to your file this script writes data to.
 * 2. Enter path your location for the Simple HTML DOM library.
 */
$file   = 'path/to/file.tsv';
include( 'path/to/simple_html_dom.php' );

/* Get Wikipedia articles URLs and tiles from lists (and tables).
 *
 * All states newspaper lists:
 * https://en.wikipedia.org/wiki/Category:Lists_of_newspapers_published_in_the_United_States_by_state
 * Example state list:
 * https://en.wikipedia.org/wiki/List_of_newspapers_in_Alabama
 *
 */
$states = array( 'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia (U.S. state)', 'Hawaii', 'Idaho', 'Indiana', 'Illinois', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Rhode Island', 'Pennsylvania', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington (state)', 'West Virginia', 'Wisconsin', 'Wyoming', 'Washington, D.C.' );

$wp_url = 'https://en.wikipedia.org/wiki/List_of_newspapers_in_';
$wp_api = 'https://en.wikipedia.org/w/api.php?action=query&prop=pageprops&ppprop=wikibase_item&redirects=1&format=json&titles=';

$items  = array( array( 'title', 'path', 'state', 'pageid', 'qid' ) ); // For array.
$text   = "title\tpath\tstate\tpageid\tqid\n"; // Tab-separated value headings.
$no_pg  = ' (page does not exist)';
$pageid = $qid = '';

foreach ( $states as $state ) {
	$url = $wp_url . str_replace( " ", "_", $state ); // Fill spaces: 'New_York'.

	$html = iffywc_parse_html_doc( $wp_url . str_replace( ' ', '_', $state ) );

	// Get info from table or list.
	$th_links = $html->find( 'div#mw-content-text table.wikitable tbody tr th i a[title]' );
	$td_links = $html->find( 'div#mw-content-text table.wikitable tbody tr > td i a[title]' );
	$li_links = $html->find( 'div#mw-content-text ul li > i a[title]' );

	$links = array_merge( $th_links, $td_links, $li_links );
	
	//
	foreach ( $links as $link ) {
		$title = $link->title;
		$href  = $link->href;

		if ( $title === 'NewspaperCat' ) { // Skip category links.
			continue;
		}

		if ( str_contains( $title, $no_pg ) ) { // If no Wikipedia article.
			$title = str_replace( $no_pg, '', $title );
			$text  .= "$title\t\t$state\t\t\n"; // Add new TSV row.

			continue;
		}

		// Get JSON data (example below).
		$data = iffywc_get_json_from_url( $wp_api . urlencode( $title ) );

		// Get Wikipedia Page ID and Wikidata QID.
		if ( is_array( $data['query']['pages'] ) ) {
			$page   = reset( $data['query']['pages'] ); // Get first element of 'pages'.
			$pageid = $page['pageid'] ?? '';
			$qid    = $page['pageprops']['wikibase_item'] ?? ''; // QID.
		}

		// echo "$title\n"; // Monitor progress.
		$text  .= "$title\t$href\t$state\t$pageid\t$qid\n"; // Add new TSV row.
	}

	echo $state . ' ' . count( $links ) . "\n"; // Monitor progress.
}

/*
JSON data example: 
{
	"batchcomplete": "",
	"query": {
	"normalized": [
		{
			"from": "The_Saline_Courier",
			"to": "The Saline Courier"
		}
		],
		"pages": {
			"57532763": {
				"pageid": 57532763,
				"ns": 0,
				"title": "The Saline Courier",
				"pageprops": {
					"wikibase_item": "Q55635526"
				}
			}
		}
	}
}
 */

/* Write data to file */
$write = iffywc_write_file( $text, $file );

// Tests:
// print_r( $items );
// echo $write;

/**
 * Convert HTML document into into object, navigable by tags and CSS selectors.
 *
 * @uses PHP Simple HTML DOM Parser
 * @see https://simplehtmldom.sourceforge.io/docs/1.9/index.html
 *
 * @link https://iffy.news/
 * @since 1.0.0
 *
 * @param string $url  URL of HTML doc.
 * @return object $html Parsed HTML doc.
 */
function iffywc_parse_html_doc( $url ) {
	$html = new simple_html_dom(); // Create a DOM object

	$html->load_file( $url ); // Load HTML from a URL

	return $html;
}

/**
 * Get Wikipedia JSON of article data via API.
 *
 * Note: To get article via Page ID:
 * https://en.wikipedia.org/?curid={pageid}17622716
 *
 * @link https://iffy.news/
 * @since 1.0.0
 *
 * @param string $txt  Text content for file.
 * @param string $path Path to file.
 *
 * @return int Length of file after writing.
 */
// $title  = 'The Saline Courier';
$wp_api = 'https://en.wikipedia.org/w/api.php?action=query&prop=pageprops&ppprop=wikibase_item&redirects=1&format=json&titles=';
function iffywc_get_wikimedia_ids( $title ) {
	global $wp_api;
	$data = iffywc_get_json_from_url( $wp_api . urlencode( $title ) );
	$page = reset( $data['query']['pages'] );

	return $page;
}

/**
 * Get JSON from URL.
 *
 * @link https://iffy.news/
 * @since 1.0.0
 *
 * @param string $txt  Text content for file.
 * @param string $path Path to file.
 *
 * @return int Length of file after writing.
 */
function iffywc_get_json_from_url( $json_url ) {
	$json = file_get_contents( $json_url );
	$data = json_decode( $json, true ); // Convert JSON to PHP array.

	return $data;
}

/**
 * Write content to file
 *
 * @link https://iffy.news/
 * @since 1.0.0
 *
 * @param string $txt  Text content for file.
 * @param string $path Path to file.
 *
 * @return int Length of file after writing.
 */
function iffywc_write_file( $txt, $path ) {
	$file  = fopen( $path, 'w' ) or die( 'Unable to open file!');
	$write = fwrite($file, $txt);
	fclose(	$file );

	return $write;
}
?>