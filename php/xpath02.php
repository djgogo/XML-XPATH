<?php
declare(strict_types = 1);

/**
 * 2) Passe den XPath so an, dass er nur zutrifft,
 *    wenn die SKU 12345 entspricht und der Name „Projektor“
 *    (sollte dasselbe zurückgeben wie vorher)
 */

$dom = new DOMDocument();
$dom->formatOutput = true;
$dom->preserveWhiteSpace = false;
$dom->load(__DIR__ . '/../xml/productNS.xml');

$xp = new DOMXPath($dom);
$xp->registerNamespace('foo', 'http://competec.ch/product');

$descriptions = $xp->query("//foo:product[@sku='12345' and @name='Projektor']/foo:description");
foreach($descriptions as $description) {
    /**
     * @var $description DOMElement
     */
    echo  "Found: " . $description->nodeValue . " \n";
}

