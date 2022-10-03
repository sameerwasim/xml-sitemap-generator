<?php

require_once './config/constants.php';
require_once './config/db.config.php';

/* Function File
  @name - String => name of the generated xml file
  @values - Array => all the links to loop
  @mode - Bool => if true returns a changefreq with daily time else return lastmod with user specified time.
  @showXML - Bool => to display generated XML
  sitemap_generator(name, values, mode, showXML);
*/
include './sitemap_generator.php';
include './main_sitemap_generator.php';

/* Stores the name of all the generated sitemaps */
$generated_sitemap = [];

/* Example */
$columns = '*'; $table = 'table'; $where = 'table.id = 1';
$join = 'JOIN tableTwo ON table.id = tableTwo.id';
$data = selectAll($conn, $columns, $table, $where, $join); # To fetch data from database

$urls = []; 
$urls[]['url'] = '/'; # To add url manaually
foreach ($data as $key => $value) {
  $urls[]['url'] = '/'.url_maker($data['name'], '-');
}
$generated_sitemap[] = sitemap_generator('sitemap-name', $urls);
/* Example */

/* Main Function
  @generated_sitemap - Array => pass all the generated sitemap name return by sitemap_generator
  @showXML - Bool => to display generated XML
  sitemap_generator(name, values, showXML);
*/

/* Generated Sitemaps */
main_sitemap_generator($generated_sitemap);
/* !Generated Sitemaps */

function url_maker($value, $splitor) {
  return preg_replace('/-+/', '-', strtolower((preg_replace('/[^A-Za-z0-9\-]/', $splitor, $value))));
}

?>