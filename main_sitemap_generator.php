<?php

function main_sitemap_generator($sitemaps, $viewXML = false) {

  $xmlString = '<?xml version="1.0" encoding="UTF-8"?>
    <sitemapindex
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:mobile="http://www.google.com/schemas/sitemap-mobile/1.0"
      xmlns:xhtml="http://www.w3.org/1999/xhtml"
      xmlns:video="http://www.google.com/schemas/sitemap-video/1.1"
      xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">';

  foreach ($sitemaps as $key => $sitemap) {
    $xmlString .=  '<sitemap>';
    $xmlString .=  '<loc>'.DOMAIN.$sitemap.'</loc>';
    $xmlString .=  '<lastmod>'.date('c').'</lastmod>';
    $xmlString .=  '</sitemap>';
  }

  $xmlString .= '</sitemapindex>';

  if ($viewXML) { var_dump($xmlString); }

  $dom = new DOMDocument;
  $dom->preserveWhiteSpace = FALSE;
  $dom->loadXML($xmlString);
  $dom->save("../sitemap-index.xml");
}

?>
