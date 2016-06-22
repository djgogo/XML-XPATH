<?php
declare(strict_types = 1);

/**
 * 4 Schreibe einen XPath, der den Typ (@type)
 *   des description Nodes ausgibt, der als erstes im DOM definiert ist
 */

$dom = new DOMDocument();
$dom->formatOutput = true;
$dom->preserveWhiteSpace = false;
$dom->load(__DIR__ . '/../xml/productNS.xml');

$xp = new DOMXPath($dom);
$xp->registerNamespace('foo', 'http://competec.ch/product');

$descriptions = $xp->query("//foo:description[@type][1]");
foreach($descriptions as $description) {
    /**
     * @var $description DOMElement
     */
    echo  "Found: " . $description->nodeValue . " \n";
}

