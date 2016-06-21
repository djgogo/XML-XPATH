<?php
declare(strict_types = 1);

/**
 * 2) Speichere das XML unverändert unter /tmp/kopie.xml
 */

$dom = new DOMDocument();
$dom->formatOutput = true;
$dom->preserveWhiteSpace = false;
$dom->load(__DIR__ . '/../xml/product.xml');

$dom->save(__DIR__ . '/../tmp/kopie.xml');
