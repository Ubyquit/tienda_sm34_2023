DELIMITER //

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_eliminarFabricante`(IN fabricante_id INT)
BEGIN
DELETE FROM fabricante WHERE id_fabricante = fabricante_id;
END


DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_verFabricantes`()
BEGIN
SELECT COUNT(id_producto) AS contador , fabricante.nombre AS nombre, id_fabricante
FROM producto RIGHT JOIN fabricante
ON producto.id_fabricante_id = fabricante.id_fabricante
GROUP BY id_fabricante;
END


DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_verProductos`()
BEGIN
SELECT id_producto,
producto.nombre,
precio,
fabricante.nombre AS fabricante
FROM producto INNER JOIN fabricante
ON producto.id_fabricante_id = fabricante.id_fabricante;
END