<?php

$installer = $this;
$installer->startSetup();

$connection = $installer->getConnection();

$connection->addColumn(
    $installer->getTable('sales/order'),
    'insurance_amount',
    "NUMERIC (10, 2) DEFAULT 0"
);
$connection->addColumn(
    $installer->getTable('sales/order'),
    'base_insurance_amount',
    "NUMERIC (10, 2) DEFAULT 0"
);
$connection->addColumn(
    $installer->getTable('sales/order'),
    'insurance_enable',
    "INT (1) DEFAULT 0"
);
$connection->addColumn(
    $installer->getTable('sales/quote_address'),
    'insurance_enable',
    "INT (1) DEFAULT 0"
);
$connection->addColumn(
    $installer->getTable('sales/quote_address'),
    'insurance_amount',
    "NUMERIC (10, 2) DEFAULT 0"
);
$connection->addColumn(
    $installer->getTable('sales/quote_address'),
    'base_insurance_amount',
    "NUMERIC (10, 2) DEFAULT 0"
);

$installer->endSetup();
