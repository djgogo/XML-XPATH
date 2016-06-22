<?php
declare(strict_types = 1);

/**
 * 3) Passe den XPath so an, dass nur die Kurzbeschreibung
 *    („short“) selektiert wird
 */

$dom = new DOMDocument();
$dom->formatOutput = true;
$dom->preserveWhiteSpace = false;
$dom->load(__DIR__ . '/../xml/productNS.xml');

$xp = new DOMXPath($dom);
$xp->registerNamespace('foo', 'http://competec.ch/product');

$descriptions = $xp->query("//foo:product[@sku='12345' and @name='Projektor']/foo:description[@type='short']");
foreach($descriptions as $description) {
    /**
     * @var $description DOMElement
     */
    echo  "Found: $description->nodeValue \n";
}

