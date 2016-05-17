ALTER TABLE `recibo_caja_m`
ADD COLUMN `valor_mayor`  double NULL AFTER `valor_efectivo`;

ALTER TABLE `detalle_caja`
ADD COLUMN `fecha_ingreso`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `valor`;

ALTER TABLE `detalle_caja`
ADD COLUMN `detalle`  text NULL AFTER `fecha_ingreso`;
