ERREUR SQL : 18 May 2016 - 11:38:13.000000 --> SELECT TRNNUM,TRNDTE,CHFNOM,VEHIMMAT FROM tournee,chauffeur WHERE tournee.CHFID=chauffeur.CHFID; : (Unknown column 'TRNDTE' in 'field list') 
ERREUR SQL : 18 May 2016 - 15:15:33.000000 --> SELECT etpid FROM etape WHERE TRNNUM=; : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1) 
ERREUR SQL : 9 Sep 2016 - 8:48:31.000000 --> SELECT TRNNUM,TRNDTE,CHFNOM,VEHIMMAT FROM tournee,chauffeur WHERE tournee.CHFID=chauffeur.CHFID; : (No database selected) 
ERREUR SQL : 9 Sep 2016 - 8:54:40.000000 --> SELECT TRNNUM,TRNDTE,CHFNOM,VEHIMMAT FROM tournee,chauffeur WHERE tournee.CHFID=chauffeur.CHFID; : (Unknown column 'TRNDTE' in 'field list') 
ERREUR SQL : 9 Sep 2016 - 9:17:22.000000 --> INSERT INTO tournee (TRNNUM, TRNDTE, CHFID, VEHIMMAT, TRNARCHAUFFEUR, TRNCOMMENTAIRE) VALUES ('3','10/09/2016', "3", "AA-225-AA", ' 01H00', 'fwfddfc'); : (Cannot add or update a child row: a foreign key constraint fails (`mesguen`.`tournee`, CONSTRAINT `tournee_ibfk_1` FOREIGN KEY (`VEHIMMAT`) REFERENCES `vehicule` (`VEHIMMAT`))) 
ERREUR SQL : 9 Sep 2016 - 9:21:25.000000 --> INSERT INTO tournee (TRNNUM, TRNDTE, CHFID, VEHIMMAT, TRNARCHAUFFEUR, TRNCOMMENTAIRE) VALUES ('3','10/09/2016', \'3\', \'AA-225-AA\', ' 01H00', 'fwfddfc'); : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '\'3\', \'AA-225-AA\', ' 01H00', 'fwfddfc')' at line 1) 
ERREUR SQL : 9 Sep 2016 - 9:21:40.000000 --> INSERT INTO tournee (TRNNUM, TRNDTE, CHFID, VEHIMMAT, TRNARCHAUFFEUR, TRNCOMMENTAIRE) VALUES ('3','10/09/2016', '3', 'AA-225-AA', ' 01H00', 'fwfddfc'); : (Cannot add or update a child row: a foreign key constraint fails (`mesguen`.`tournee`, CONSTRAINT `tournee_ibfk_1` FOREIGN KEY (`VEHIMMAT`) REFERENCES `vehicule` (`VEHIMMAT`))) 
ERREUR SQL : 9 Sep 2016 - 9:46:35.000000 --> INSERT INTO tournee (TRNNUM, TRNDTE, CHFID, VEHIMMAT, TRNARCHAUFFEUR, TRNCOMMENTAIRE) VALUES ('3','10/09/2016', '3', 'AA-225-AA', ' 01H00', 'fwfddfc'); : (Cannot add or update a child row: a foreign key constraint fails (`mesguen`.`tournee`, CONSTRAINT `tournee_ibfk_1` FOREIGN KEY (`VEHIMMAT`) REFERENCES `vehicule` (`VEHIMMAT`) ON DELETE CASCADE ON UPDATE CASCADE)) 
ERREUR SQL : 9 Sep 2016 - 9:47:15.000000 --> INSERT INTO tournee (TRNNUM, TRNDTE, CHFID, VEHIMMAT, TRNARCHAUFFEUR, TRNCOMMENTAIRE) VALUES ('3','10/09/2016', '3', 'AA-225-AA', ' 01H00', 'fwfddfc'); : (Cannot add or update a child row: a foreign key constraint fails (`mesguen`.`tournee`, CONSTRAINT `tournee_ibfk_1` FOREIGN KEY (`VEHIMMAT`) REFERENCES `vehicule` (`VEHIMMAT`) ON DELETE CASCADE ON UPDATE CASCADE)) 
ERREUR SQL : 9 Sep 2016 - 11:51:57.000000 --> UPDATE tournee SET `TRNNUM` = '1', `TRNDTE` = '0000-00-00', `CHFID` = '6', `VEHIMMAT` = 'AA-224-AA', `TRNARCHAUFFEUR` = ' 00H00', `TRNCOMMENTAIRE` = 'yydfhhddhgh' WHERE `tournee`.`TRNNUM` = '1'; : (Cannot add or update a child row: a foreign key constraint fails (`mesguen`.`tournee`, CONSTRAINT `tournee_ibfk_1` FOREIGN KEY (`VEHIMMAT`) REFERENCES `vehicule` (`VEHIMMAT`))) 