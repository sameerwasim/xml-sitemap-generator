<?php

function sitemap_generator($name, $values, $mode = true, $viewXML = false) {

  $xmlString = '<?xml version="1.0" encoding="UTF-8"?>
    <urlset
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

  foreach ($values as $key => $value) {
    $xmlString .=  '<url>';
    $xmlString .=  '<loc>'.DOMAIN.$value['url'].'</loc>';
    $xmlString .=  ($mode) ? '<changefreq>daily</changefreq>' : '<lastmod>'.$value['time'].'</lastmod>';
    $xmlString .=  '</url>';
  }

  $xmlString .= '</urlset>';

  if ($viewXML) { var_dump($xmlString); }

  $dom = new DOMDocument;
  $dom->preserveWhiteSpace = FALSE;
  $dom->loadXML($xmlString);
  $dom->save("../$name-sitemap.xml");

  return "$name-sitemap.xml";
}

?>
