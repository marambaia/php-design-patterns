/**
 * Author:  Bernardo
 * Created: 06/12/2017
 */
ALTER TABLE `guestbook` 
ADD INDEX `IDX_COUNTRY_ID` (`country_id` ASC);

ALTER TABLE `guestbook` 
ADD CONSTRAINT `FK_Countries`
  FOREIGN KEY (`country_id`)
  REFERENCES `countries` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
