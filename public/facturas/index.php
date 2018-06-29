<?php
require_once('../../db.php');
require_once('../../auth.php');
checkAuth([1]);

$facturas = getConnection()->query("SELECT facturas.*, clientes.nombre_apellido AS cliente, (SELECT SUM(detalles.subtotal) FROM detalles WHERE detalles.factura_id = facturas.id) AS total FROM facturas JOIN clientes ON clientes.id = facturas.cliente_id;")->fetchAll();

define('PAGE_VIEW', 'facturas_index.php');
require('../../layout.php');
