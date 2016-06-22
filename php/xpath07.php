<?php
declare(strict_types = 1);

/**
 * 7) Schreibe einen XPath, welcher den Pfad (src) zum original Bild Ausgibt
 */

$dom = new DOMDocument();
$dom->formatOutput = true;
$dom->preserveWhiteSpace = false;
$dom->load(__DIR__ . '/../xml/competec.xml');

$xp = new DOMXPath($dom);
$xp->registerNamespace('foo', 'http://competec.ch/images');

$imageSize = $xp->query("//foo:size[@variant='original']");

foreach($imageSize as $size) {
    /**
     * @var $size DOMElement
     */
    echo  "Found: " . $size->getAttribute('src') . " \n";
}



