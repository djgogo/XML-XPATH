<?php
declare(strict_types = 1);

/**
 * 5) Schreibe Code (PHP + entsprechende XPath),
 *    der aus dem XML den kleinsten und grössten Preis ermittelt
 *    und die zugehörige Preisklasse ausgibt
 */

$dom = new DOMDocument();
$dom->formatOutput = true;
$dom->preserveWhiteSpace = false;
$dom->load(__DIR__ . '/../xml/competec.xml');

$xp = new DOMXPath($dom);
$xp->registerNamespace('foo', 'http://competec.ch/product');

$prices = $xp->query("//foo:price[@value = not(. < ../foo:price/@value)][1]");
foreach($prices as $price) {
    /**
     * @var $price DOMElement
     */
    echo  "Highest Price Found: " . $price->getAttribute('value') . " \n";
    echo  "on Class: " . $price->getAttribute('class') . " \n";
}

