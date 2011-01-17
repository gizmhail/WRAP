
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- RaidPeriod
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `RaidPeriod`;


CREATE TABLE `RaidPeriod`
(
	`idRaidPeriod` INTEGER  NOT NULL AUTO_INCREMENT,
	`status` VARCHAR(45),
	`analysed` TINYINT,
	PRIMARY KEY (`idRaidPeriod`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- Raid
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Raid`;


CREATE TABLE `Raid`
(
	`idRaid` INTEGER  NOT NULL AUTO_INCREMENT,
	`date` VARCHAR(45),
	`RaidPeriod_idRaidPeriod` INTEGER  NOT NULL,
	`status` VARCHAR(45),
	`comment` TEXT,
	`analysed` TINYINT,
	PRIMARY KEY (`idRaid`),
	KEY `fk_Raid_RaidPeriod1`(`RaidPeriod_idRaidPeriod`),
	CONSTRAINT `fk_Raid_RaidPeriod1`
		FOREIGN KEY (`RaidPeriod_idRaidPeriod`)
		REFERENCES `RaidPeriod` (`idRaidPeriod`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- Player
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Player`;


CREATE TABLE `Player`
(
	`idPlayer` INTEGER  NOT NULL AUTO_INCREMENT,
	`playerName` VARCHAR(100),
	`tokenCount` INTEGER,
	`goldTokenCount` INTEGER,
	`status` VARCHAR(45),
	PRIMARY KEY (`idPlayer`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- Loot
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Loot`;


CREATE TABLE `Loot`
(
	`idLoot` INTEGER  NOT NULL AUTO_INCREMENT,
	`Raid_idRaid` INTEGER  NOT NULL,
	`Player_idPlayer` INTEGER  NOT NULL,
	`lootName` VARCHAR(200),
	`comment` TEXT,
	`ilvl` INTEGER,
	PRIMARY KEY (`idLoot`),
	KEY `fk_Loot_Raid1`(`Raid_idRaid`),
	KEY `fk_Loot_Player1`(`Player_idPlayer`),
	CONSTRAINT `fk_Loot_Raid1`
		FOREIGN KEY (`Raid_idRaid`)
		REFERENCES `Raid` (`idRaid`),
	CONSTRAINT `fk_Loot_Player1`
		FOREIGN KEY (`Player_idPlayer`)
		REFERENCES `Player` (`idPlayer`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- Buff
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Buff`;


CREATE TABLE `Buff`
(
	`idBuff` INTEGER  NOT NULL AUTO_INCREMENT,
	`icon` VARCHAR(1000),
	`text` VARCHAR(100),
	PRIMARY KEY (`idBuff`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- PlayerSpecialization
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `PlayerSpecialization`;


CREATE TABLE `PlayerSpecialization`
(
	`idPlayerSpecialization` INTEGER  NOT NULL AUTO_INCREMENT,
	`Player_idPlayer` INTEGER  NOT NULL,
	`specializationName` VARCHAR(45),
	`role` VARCHAR(45),
	PRIMARY KEY (`idPlayerSpecialization`),
	KEY `fk_PlayerSpecialization_Player1`(`Player_idPlayer`),
	CONSTRAINT `fk_PlayerSpecialization_Player1`
		FOREIGN KEY (`Player_idPlayer`)
		REFERENCES `Player` (`idPlayer`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- Raid_has_Player
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Raid_has_Player`;


CREATE TABLE `Raid_has_Player`
(
	`Raid_idRaid` INTEGER  NOT NULL AUTO_INCREMENT,
	`Player_idPlayer` INTEGER  NOT NULL,
	`status` VARCHAR(45),
	`inscription` INTEGER,
	PRIMARY KEY (`Raid_idRaid`,`Player_idPlayer`),
	KEY `fk_Raid_has_Player_Player1`(`Player_idPlayer`),
	KEY `fk_Raid_has_Player_Raid`(`Raid_idRaid`),
	CONSTRAINT `fk_Raid_has_Player_Raid`
		FOREIGN KEY (`Raid_idRaid`)
		REFERENCES `Raid` (`idRaid`),
	CONSTRAINT `fk_Raid_has_Player_Player1`
		FOREIGN KEY (`Player_idPlayer`)
		REFERENCES `Player` (`idPlayer`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- PlayerSpecialization_has_Buff
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `PlayerSpecialization_has_Buff`;


CREATE TABLE `PlayerSpecialization_has_Buff`
(
	`PlayerSpecialization_idPlayerSpecialization` INTEGER  NOT NULL AUTO_INCREMENT,
	`Buff_idBuff` INTEGER  NOT NULL,
	PRIMARY KEY (`PlayerSpecialization_idPlayerSpecialization`,`Buff_idBuff`),
	KEY `fk_PlayerSpecialization_has_Buff_Buff1`(`Buff_idBuff`),
	KEY `fk_PlayerSpecialization_has_Buff_PlayerSpecialization1`(`PlayerSpecialization_idPlayerSpecialization`),
	CONSTRAINT `fk_PlayerSpecialization_has_Buff_PlayerSpecialization1`
		FOREIGN KEY (`PlayerSpecialization_idPlayerSpecialization`)
		REFERENCES `PlayerSpecialization` (`idPlayerSpecialization`),
	CONSTRAINT `fk_PlayerSpecialization_has_Buff_Buff1`
		FOREIGN KEY (`Buff_idBuff`)
		REFERENCES `Buff` (`idBuff`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
