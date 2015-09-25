ALTER TABLE pos.ospos_modules
ADD icon varchar(50);


UPDATE `pos`.`ospos_modules` SET `icon`='fa-wrench' WHERE `module_id`='config';
UPDATE `pos`.`ospos_modules` SET `icon`='fa-users' WHERE `module_id`='customers';
UPDATE `pos`.`ospos_modules` SET `icon`='fa-credit-card' WHERE `module_id`='giftcards';
UPDATE `pos`.`ospos_modules` SET `icon`='fa-shopping-cart ' WHERE `module_id`='sales';
UPDATE `pos`.`ospos_modules` SET `icon`='fa-cube' WHERE `module_id`='items';
UPDATE `pos`.`ospos_modules` SET `icon`='fa-male' WHERE `module_id`='employees';
UPDATE `pos`.`ospos_modules` SET `icon`='fa-download' WHERE `module_id`='receivings';
UPDATE `pos`.`ospos_modules` SET `icon`='fa-truck' WHERE `module_id`='suppliers';
UPDATE `pos`.`ospos_modules` SET `icon`='fa-cubes ' WHERE `module_id`='item_kits';
UPDATE `pos`.`ospos_modules` SET `icon`='fa-line-chart ' WHERE `module_id`='reports';
