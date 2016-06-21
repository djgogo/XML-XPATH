<?php
declare(strict_types = 1);

/**
 * 4) Erstelle ein neues DOMDocument $dom und lade folgendes als Ausgangslage:
 * $dom->loadXML('<?xml version="1.0" ?><product />');
 * Erweitere das XML mittels geeigneten Befehlen, sodass folgende Endform entsteht:
 *
 * <?xml version="1.0"?>
 * <product sku="123456">
 *   <description type="short"/>
 * </product>
 *
 */

$dom = new DOMDocument();
$dom->formatOutput = true;
$dom->preserveWhiteSpace = false;
$dom->loadXML('<?xml version="1.0" ?><product />');

$xp = new DOMXPath($dom);

$xp->document->documentElement->setAttribute('sku', '123456');

$description = $dom->createElement('description');
$xp->document->documentElement->appendChild($description);
$description->setAttribute('type', 'short');

echo $dom->saveXML();
$dom->save(__DIR__ . '/../xml/productNew.xml');
