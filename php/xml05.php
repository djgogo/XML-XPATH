<?php
declare(strict_types = 1);

/**
 * 5) Importiere den Node „description“ von der vorherigen Aufgabe
 * in ein 2. DOM Objekt, welches das beispiel Produkt XML geladen hat
 * und appende den Node an die root Node.
 */

/* Dom Document with the original Node  */
$dom = new DOMDocument();
$dom->formatOutput = true;
$dom->preserveWhiteSpace = false;
$dom->load(__DIR__ . '/../xml/productNew.xml');

/* Dom Document where we append the copied Node  */
$dom2 = new DOMDocument();
$dom2->formatOutput = true;
$dom2->preserveWhiteSpace = false;
$dom2->load(__DIR__ . '/../xml/product.xml');

/* get the Node description */
$description = $node = $dom->getElementsByTagName("description")->item(0);
/* Import the Node to Dom2  */
$newNode = $dom2->importNode($description, true);
/* append the copied Node  */
$dom2->documentElement->appendChild($newNode);

echo $dom2->saveXML();


