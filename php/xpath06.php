<?php
declare(strict_types = 1);

/**
 * 6) Schreibe Code (evtl. Xpath möglich?)
 * der alle Preise addiert und die Summe berechnet
 */

$dom = new DOMDocument();
$dom->formatOutput = true;
$dom->preserveWhiteSpace = false;
$dom->load(__DIR__ . '/../xml/competec.xml');

$xp = new DOMXPath($dom);
$xp->registerNamespace('foo', 'http://competec.ch/product');

$total = 0;
$prices = $xp->query("//foo:price/@value");
foreach($prices as $price) {
    if($price->nodeValue !== null){
        $total += $price->nodeValue;
    }
}
echo  "Total aller Preise: $total\n";

/* with XPath */
$prices = $xp->query("//foo:price/@value");
$sum = (int) $xp->evaluate('sum(//foo:price/@value)');

echo  "Total aller Preise: $sum\n";
