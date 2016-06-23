<?php
declare(strict_types = 1);

/**
 * 1) Iteriere über alle Tags im XML,
 *    füge immer das Attribut „visited“ = $counter hinzu
 *    und gib das XML aus
 *
 *    --> with Namespaces!
 */

$dom = new DOMDocument();
$dom->formatOutput = true;
$dom->preserveWhiteSpace = false;
$dom->load(__DIR__ . '/../xml/productNS.xml');

$xp = new DOMXPath($dom);
$xp->registerNamespace('foo', 'http://competec.ch/product');

$counter = '1';
foreach($xp->query('//foo:*') as $element) {
    /**
     * @var $element DOMElement
     */
    $element->setAttribute('visited', (string)$counter);
    $counter++;
}

echo $dom->saveXML();
