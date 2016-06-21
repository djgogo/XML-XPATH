<?php
declare(strict_types = 1);

/**
 * 4) Erstelle ein neues XML-File mit XMLWriter so dass folgende Endform entsteht:
 *
 * <?xml version="1.0" encoding="UTF-8?>
 * <product sku="123456">
 *   <description type="short"/>
 * </product>
 *
 */

$oXMLWriter = new XMLWriter;
$oXMLWriter->openMemory();
$oXMLWriter->startDocument('1.0', 'UTF-8');

    $oXMLWriter->startElement('product');
        $oXMLWriter->writeAttribute('sku', '123456');

            $oXMLWriter->startElement('description');
                $oXMLWriter->writeAttribute('type', 'short');
            $oXMLWriter->endElement();

    $oXMLWriter->endElement();

$oXMLWriter->endDocument();

echo $oXMLWriter->outputMemory(TRUE);
