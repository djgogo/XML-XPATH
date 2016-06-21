<?php
declare(strict_types = 1);

/**
 * 1) XML laden, Dom Objekt erstellen und XML wieder ausgeben
 */

$dom = new DOMDocument();
$dom->formatOutput = true;
$dom->preserveWhiteSpace = false;
$dom->load(__DIR__ . '/../xml/product.xml');

echo $dom->saveXML();
