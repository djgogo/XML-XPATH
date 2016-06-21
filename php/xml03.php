<?php
declare(strict_types = 1);

/**
 * 1) Iteriere über alle Tags im XML,
 *    füge immer das Attribut „visited“ = $counter hinzu
 *    und gib das XML aus
 */

$dom = new DOMDocument();
$dom->formatOutput = true;
$dom->preserveWhiteSpace = false;
$dom->load(__DIR__ . '/../xml/product.xml');

$xp = new DOMXPath($dom);

$counter = '1';
foreach($xp->query('//*') as $element) {
    $element->setAttribute('visited', (string)$counter);
    $counter++;
}

echo $dom->saveXML();
