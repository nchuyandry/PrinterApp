DELIMITER $$

USE `printer`$$

DROP PROCEDURE IF EXISTS `fill_calendar2`$$

CREATE DEFINER=`dashboard`@`%` PROCEDURE `fill_calendar2`(start_date DATE, end_date DATE)
BEGIN
	DECLARE crt_date DATE;
	SET crt_date=start_date;
	WHILE
		crt_date <= end_date
	DO
		INSERT INTO calendar VALUES(crt_date);
	SET crt_date = ADDDATE(crt_date, INTERVAL 1 DAY);
	END WHILE;
	END$$

DELIMITER ;
