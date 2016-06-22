<?php
declare(strict_types = 1);

/**
 * 1) Ermittle mittels XPath die Produktbeschreibungen und gib sie aus
 *    aus productNS.xml
 */

$dom = new DOMDocument();
$dom->formatOutput = true;
$dom->preserveWhiteSpace = false;
$dom->load(__DIR__ . '/../xml/productNS.xml');

/* without XPath */
$descriptions = $dom->getElementsByTagName("description");
foreach($descriptions as $description) {
    echo  "Found: " . $description->nodeValue . " \n";
}

/* with XPath */
$xp = new DOMXPath($dom);
$xp->registerNamespace('foo', 'http://competec.ch/product');
$descriptions = $xp->query("//foo:description");

foreach($descriptions as $description) {
    /**
     * @var $description DOMElement
     */
    echo  "Found: " . $description->nodeValue . " \n";
}

