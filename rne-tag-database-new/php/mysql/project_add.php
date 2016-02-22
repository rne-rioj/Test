<?php
// Posted data
$name = $_POST[$PROJECT_ADD_NAME];
$desc = $_POST[$PROJECT_ADD_DESC];

// Establish MySQL connection
$conn = mysqlConn($PROJECT_DB);

// Insert into project list
$sql = "INSERT INTO `projects` (`name`, `description`) VALUES ('" . $name . "', '" . $desc ."')";
$conn->query($sql);

// Create database `rne_prj_$name`
$sql = "CREATE DATABASE IF NOT EXISTS `rne_prj_" . $name . "` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci";
$conn->query($sql);

// Select new project database
$sql = "USE `rne_prj_" . $name . "`";
$conn->query($sql);

// Create table `audit`
$sql = "CREATE TABLE IF NOT EXISTS `audit` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`table` text NOT NULL,
	`column` text NOT NULL,
	`user_id` int(11) NOT NULL,
	`row_id` int(11) NOT NULL,
	`before` text,
	`after` text,
	`datetime` datetime NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1";
$conn->query($sql);

// Create table `deficiencies`
$sql = "CREATE TABLE IF NOT EXISTS `deficiencies` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`row_id` int(11) NOT NULL,
	`description` text,
	`complete_date` datetime NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1";
$conn->query($sql);

// Create table `deficiencies`
$sql = "CREATE TABLE IF NOT EXISTS `tags` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` text NOT NULL,
	`description` text NOT NULL,
	`type` text NOT NULL,
	`eu` text NOT NULL,
	`min` text NOT NULL,
	`max` text NOT NULL,
	`hihi` text NOT NULL,
	`high` text NOT NULL,
	`low` text NOT NULL,
	`lolo` text NOT NULL,
	`hihiCheck` tinyint(1) NOT NULL,
	`highCheck` tinyint(1) NOT NULL,
	`lowCheck` tinyint(1) NOT NULL,
	`loloCheck` tinyint(1) NOT NULL,
	`panel` text NOT NULL,
	`drop` text NOT NULL,
	`plc` text NOT NULL,
	`rack` text NOT NULL,
	`slot` text NOT NULL,
	`channel` text NOT NULL,
	`memory` text NOT NULL,
	`pnid` text NOT NULL,
	`elec` text NOT NULL,
	`wireline` text NOT NULL,
	`datasheet` text NOT NULL,
	`comment` text NOT NULL,
	`panel_date` datetime NOT NULL,
	`panel_note` text NOT NULL,
	`construction_date` datetime NOT NULL,
	`construction_note` text NOT NULL,
	`hmi_date` datetime NOT NULL,
	`hmi_note` text NOT NULL,
	`plc_date` datetime NOT NULL,
	`plc_note` text NOT NULL,
	`deleted` datetime DEFAULT NULL,
	`completed` datetime DEFAULT NULL,
	`created` datetime DEFAULT NULL,
	`user_id` int(11) NOT NULL,
	`subproject` text NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1";
$conn->query($sql);

$sql="
CREATE TRIGGER `beforeInsert` BEFORE INSERT ON `tags` 
FOR EACH ROW begin

DECLARE next_id INT;
SET next_id = (SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA=DATABASE() AND TABLE_NAME='tags');

SET NEW.name=TRIM(replace(UPPER(NEW.name), ' ', '_'));
SET NEW.description = TRIM(UPPER(NEW.description));

IF NEW.drop <> '' AND CHAR_LENGTH(NEW.drop) < 2 THEN
SET NEW.drop = LPAD(TRIM(UPPER(NEW.drop)), 2, '0');
END IF;

IF NEW.plc <> '' AND CHAR_LENGTH(NEW.plc) < 2 THEN
SET NEW.plc = LPAD(TRIM(UPPER(NEW.plc)), 2, '0');
END IF;

IF NEW.rack <> '' AND CHAR_LENGTH(NEW.rack) < 2 THEN
SET NEW.rack = LPAD(TRIM(UPPER(NEW.rack)), 2, '0');
END IF;

IF NEW.slot <> '' AND CHAR_LENGTH(NEW.slot) < 2 THEN
SET NEW.slot = LPAD(TRIM(UPPER(NEW.slot)), 2, '0');
END IF;

IF NEW.channel <> '' AND CHAR_LENGTH(NEW.channel) < 2 THEN
SET NEW.channel = LPAD(TRIM(UPPER(NEW.channel)), 2, '0');
END IF;

IF NEW.name <> '' AND NEW.name IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'name', next_id, '', NEW.name, now());
END IF;

IF NEW.description <> '' AND NEW.description IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'description', next_id, '', NEW.description, now());
END IF;

IF NEW.type <> '' AND NEW.type IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'type', next_id, '', NEW.type, now());
END IF;

IF NEW.eu <> '' AND NEW.eu IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'eu', next_id, '', NEW.eu, now());
END IF;

IF NEW.min <> '' AND NEW.min IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'min', next_id, '', NEW.min, now());
END IF;

IF NEW.max <> '' AND NEW.max IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'max', next_id, '', NEW.max, now());
END IF;

IF NEW.hihi <> '' AND NEW.hihi IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'hihi', next_id, '', NEW.hihi, now());
END IF;

IF NEW.high <> '' AND NEW.high IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'high', next_id, '', NEW.high, now());
END IF;

IF NEW.low <> '' AND NEW.low IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'low', next_id, '', NEW.low, now());
END IF;

IF NEW.lolo <> '' AND NEW.lolo IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'lolo', next_id, '', NEW.lolo, now());
END IF;

IF NEW.drop <> '' AND NEW.drop IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'drop', next_id, '', NEW.drop, now());
END IF;

IF NEW.rack <> '' AND NEW.rack IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'rack', next_id, '', NEW.rack, now());
END IF;

IF NEW.slot <> '' AND NEW.slot IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'slot', next_id, '', NEW.slot, now());
END IF;

IF NEW.channel <> '' AND NEW.channel IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'channel', next_id, '', NEW.channel, now());
END IF;

IF NEW.memory <> '' AND NEW.memory IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'memory', next_id, '', NEW.memory, now());
END IF;

IF NEW.pnid <> '' AND NEW.pnid IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'pnid', next_id, '', NEW.pnid, now());
END IF;

IF NEW.elec <> '' AND NEW.elec IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'elec', next_id, '', NEW.elec, now());
END IF;

IF NEW.wireline <> '' AND NEW.wireline IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'wireline', next_id, '', NEW.wireline, now());
END IF;

IF NEW.datasheet <> '' AND NEW.datasheet IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'datasheet', next_id, '', NEW.datasheet, now());
END IF;

IF NEW.comment <> '' AND NEW.comment IS NOT NULL THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'comment', next_id, '', NEW.comment, now());
END IF;

IF NEW.deleted <> '' AND NEW.deleted IS NOT NULL AND NEW.deleted <> 0 THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'deleted', next_id, '', NEW.deleted, now());
END IF;

IF NEW.completed <> '' AND NEW.completed IS NOT NULL AND NEW.completed <> 0 THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`) VALUES ('tags', 'completed', next_id, '', NEW.completed, now());
END IF;

SET NEW.completed = 0;
IF (NEW.hihi = '' OR NEW.hihiCheck <> 0) AND (NEW.high = '' OR NEW.highCheck <> 0) AND (NEW.low = '' OR NEW.lowCheck <> 0) AND (NEW.lolo = '' OR NEW.loloCheck <> 0) AND NEW.panel_date <> 0 AND NEW.construction_date <> 0 AND NEW.hmi_date <> 0 AND NEW.plc_date <> 0 THEN
SET NEW.completed = now();
END IF;

SET NEW.created = now();

end;";
$conn->query($sql);

$sql="CREATE TRIGGER `beforeUpdate` BEFORE UPDATE ON `tags`
FOR EACH ROW begin

DECLARE tag_id INT;
SET tag_id = OLD.id;

SET NEW.name=TRIM(replace(UPPER(NEW.name), ' ', '_'));
SET NEW.description = TRIM(UPPER(NEW.description));

IF NEW.drop <> '' AND CHAR_LENGTH(NEW.drop) < 2 THEN
SET NEW.drop = LPAD(TRIM(UPPER(NEW.drop)), 2, '0');
END IF;

IF NEW.plc <> '' AND CHAR_LENGTH(NEW.plc) < 2 THEN
SET NEW.plc = LPAD(TRIM(UPPER(NEW.plc)), 2, '0');
END IF;

IF NEW.rack <> '' AND CHAR_LENGTH(NEW.rack) < 2 THEN
SET NEW.rack = LPAD(TRIM(UPPER(NEW.rack)), 2, '0');
END IF;

IF NEW.slot <> '' AND CHAR_LENGTH(NEW.slot) < 2 THEN
SET NEW.slot = LPAD(TRIM(UPPER(NEW.slot)), 2, '0');
END IF;

IF NEW.channel <> '' AND CHAR_LENGTH(NEW.channel) < 2 THEN
SET NEW.channel = LPAD(TRIM(UPPER(NEW.channel)), 2, '0');
END IF;

IF NEW.name <> OLD.name  THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'name', tag_id, OLD.name, NEW.name, now(), NEW.user_id);
END IF;

IF NEW.description <> OLD.description THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'description', tag_id, OLD.description, NEW.description, now(), NEW.user_id);
END IF;

IF NEW.type <> OLD.type THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'type', tag_id, OLD.type, NEW.type, now(), NEW.user_id);
END IF;

IF NEW.eu <> OLD.eu THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'eu', tag_id, OLD.eu, NEW.eu, now(), NEW.user_id);
END IF;

IF NEW.min <> OLD.min THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'min', tag_id, OLD.min, NEW.min, now(), NEW.user_id);
END IF;

IF NEW.max <> OLD.max THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'max', tag_id, OLD.max, NEW.max, now(), NEW.user_id);
END IF;

IF NEW.hihi <> OLD.hihi THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'hihi', tag_id, OLD.hihi, NEW.hihi, now(), NEW.user_id);
END IF;

IF NEW.high <> OLD.high THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'high', tag_id, OLD.high, NEW.high, now(), NEW.user_id);
END IF;

IF NEW.low <> OLD.low THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'low', tag_id, OLD.low, NEW.low, now(), NEW.user_id);
END IF;

IF NEW.lolo <> OLD.lolo THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'lolo', tag_id, OLD.lolo, NEW.lolo, now(), NEW.user_id);
END IF;

IF NEW.hihiCheck <> OLD.hihiCheck THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'hihiCheck', tag_id, OLD.hihiCheck, NEW.hihiCheck, now(), NEW.user_id);
END IF;

IF NEW.highCheck <> OLD.highCheck THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'highCheck', tag_id, OLD.highCheck, NEW.highCheck, now(), NEW.user_id);
END IF;

IF NEW.lowCheck <> OLD.lowCheck THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'lowCheck', tag_id, OLD.lowCheck, NEW.lowCheck, now(), NEW.user_id);
END IF;

IF NEW.loloCheck <> OLD.loloCheck THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'loloCheck', tag_id, OLD.loloCheck, NEW.loloCheck, now(), NEW.user_id);
END IF;

IF NEW.panel_date <> OLD.panel_date THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'panel_date', tag_id, OLD.panel_date, NEW.panel_date, now(), NEW.user_id);
END IF;

IF NEW.panel_note <> OLD.panel_note THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'panel_note', tag_id, OLD.panel_note, NEW.panel_note, now(), NEW.user_id);
END IF;

IF NEW.construction_date <> OLD.construction_date THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'construction_date', tag_id, OLD.construction_date, NEW.construction_date, now(), NEW.user_id);
END IF;

IF NEW.construction_note <> OLD.construction_note THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'construction_note', tag_id, OLD.construction_note, NEW.construction_note, now(), NEW.user_id);
END IF;

IF NEW.hmi_date <> OLD.hmi_date THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'hmi_date', tag_id, OLD.hmi_date, NEW.hmi_date, now(), NEW.user_id);
END IF;

IF NEW.hmi_note <> OLD.hmi_note THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'hmi_note', tag_id, OLD.hmi_note, NEW.hmi_note, now(), NEW.user_id);
END IF;

IF NEW.plc_date <> OLD.plc_date THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'plc_date', tag_id, OLD.plc_date, NEW.plc_date, now(), NEW.user_id);
END IF;

IF NEW.plc_note <> OLD.plc_note THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'plc_note', tag_id, OLD.plc_note, NEW.plc_note, now(), NEW.user_id);
END IF;

IF NEW.drop <> OLD.drop THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'drop', tag_id, OLD.drop, NEW.drop, now(), NEW.user_id);
END IF;

IF NEW.rack <> OLD.rack THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'rack', tag_id, OLD.rack, NEW.rack, now(), NEW.user_id);
END IF;

IF NEW.slot <> OLD.slot THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'slot', tag_id, OLD.slot, NEW.slot, now(), NEW.user_id);
END IF;

IF NEW.channel <> OLD.channel THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'channel', tag_id, OLD.channel, NEW.channel, now(), NEW.user_id);
END IF;

IF NEW.memory <> OLD.memory THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'memory', tag_id, OLD.memory, NEW.memory, now(), NEW.user_id);
END IF;

IF NEW.pnid <> OLD.pnid THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'pnid', tag_id, OLD.pnid, NEW.pnid, now(), NEW.user_id);
END IF;

IF NEW.elec <> OLD.elec THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'elec', tag_id, OLD.elec, NEW.elec, now(), NEW.user_id);
END IF;

IF NEW.wireline <> OLD.wireline THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'wireline', tag_id, OLD.wireline, NEW.wireline, now(), NEW.user_id);
END IF;

IF NEW.datasheet <> OLD.datasheet THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'datasheet', tag_id, OLD.datasheet, NEW.datasheet, now(), NEW.user_id);
END IF;

IF NEW.comment <> OLD.comment THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'comment', tag_id, OLD.comment, NEW.comment, now(), NEW.user_id);
END IF;

IF NEW.deleted <> OLD.deleted THEN
INSERT INTO audit (`table`, `column`, `row_id`, `before`, `after`, `datetime`, `user_id`) VALUES ('tags', 'deleted', tag_id, OLD.deleted, NEW.deleted, now(), NEW.user_id);
END IF;

IF (NEW.hihi = '' OR NEW.hihiCheck <> 0) AND (NEW.high = '' OR NEW.highCheck <> 0) AND (NEW.low = '' OR NEW.lowCheck <> 0) AND (NEW.lolo = '' OR NEW.loloCheck <> 0) AND NEW.panel_date <> 0 AND NEW.construction_date <> 0 AND NEW.hmi_date <> 0 AND NEW.plc_date <> 0 AND NEW.deleted = 0 THEN

IF (NEW.hihi <> OLD.hihi) OR (NEW.high <> OLD.high) OR (NEW.low <> OLD.low) OR (NEW.lolo <> OLD.lolo) THEN
SET NEW.completed = now();
END IF;

ELSE

SET NEW.completed = 0;

END IF;

end;";
$conn->query($sql);

// Close MySQL connection
$conn->close();
?>
