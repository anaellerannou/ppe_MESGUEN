ERREUR SQL : 16 May 2017 - 14:05:38.000000 --> INSERT INTO tournee (TRNNUM, TRNDTE, CHFID, VEHIMMAT, TRNARCHAUFFEUR, TRNCOMMENTAIRE) 
		VALUES ('5','2017-05-16', '10', 'AA-223-AA', '16/05/2017 00H00', ''); : (Duplicate entry '5' for key 'PRIMARY') 
ERREUR SQL : 16 May 2017 - 14:34:49.000000 --> UPDATE `mesguen`.`etape` SET `LIEUID` = '3', `ETPCOMMENTAIRE` = 'soyez � l'heure', `ETPHREDEBUT` = '2017-05-17 04:50:00', `ETPHREFIN` = '2017-05-17 05:10:00' WHERE `etape`.`TRNNUM` = '1' AND `etape`.`ETPID` = '2'; : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'heure', `ETPHREDEBUT` = '2017-05-17 04:50:00', `ETPHREFIN` = '2017-05-17 05:10:0' at line 1) 
ERREUR SQL : 16 May 2017 - 14:36:23.000000 --> INSERT INTO etape (TRNNUM, ETPID, LIEUID, ETPCOMMENTAIRE, ETPHREDEBUT, ETPHREFIN) VALUES ('1','2','4', "", "2017-05-19 06:50:00", '2017-05-19 07:10:00'); : (Duplicate entry '1-2' for key 'PRIMARY') 
ERREUR SQL : 16 May 2017 - 14:44:05.000000 --> INSERT INTO etape (TRNNUM, ETPID, LIEUID, ETPCOMMENTAIRE, ETPHREDEBUT, ETPHREFIN) VALUES ('1','2','2', "", "2017-05-25 07:50:00", '2017-05-25 08:10:00'); : (Duplicate entry '1-2' for key 'PRIMARY') 
ERREUR SQL : 16 May 2017 - 14:47:13.000000 --> INSERT INTO etape (TRNNUM, ETPID, LIEUID, ETPCOMMENTAIRE, ETPHREDEBUT, ETPHREFIN) VALUES ('1','2','4', "", "2017-05-25 00:00:00", '2017-05-25 00:00:00'); : (Duplicate entry '1-2' for key 'PRIMARY') 
ERREUR SQL : 16 May 2017 - 14:54:28.000000 --> INSERT INTO etape (TRNNUM, ETPID, LIEUID, ETPCOMMENTAIRE, ETPHREDEBUT, ETPHREFIN) VALUES ('1','2','1', "", "2017-05-19 00:00:00", '2017-05-19 00:00:00'); : (Duplicate entry '1-2' for key 'PRIMARY') 
ERREUR SQL : 16 May 2017 - 15:45:17.000000 --> INSERT INTO tournee (TRNNUM, TRNDTE, CHFID, VEHIMMAT, TRNARCHAUFFEUR, TRNCOMMENTAIRE) 
		VALUES ('5','', '38', 'AA-220-AA', '25/05/2017 08H00', ''); : (Duplicate entry '5' for key 'PRIMARY') 
ERREUR SQL : 16 May 2017 - 15:46:05.000000 --> INSERT INTO tournee (TRNNUM, TRNDTE, CHFID, VEHIMMAT, TRNARCHAUFFEUR, TRNCOMMENTAIRE) 
		VALUES ('5','24/05/2017', '3', 'AA-220-AA', '25/05/2017 00H00', ''); : (Duplicate entry '5' for key 'PRIMARY') 
ERREUR SQL : 16 May 2017 - 15:50:23.000000 --> SELECT CHFID,CHFNOM FROM chauffeur where CHFID=; : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1) 
ERREUR SQL : 16 May 2017 - 15:51:10.000000 --> SELECT CHFID,CHFNOM FROM chauffeur where CHFID=; : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1) 
ERREUR SQL : 16 May 2017 - 15:52:39.000000 --> SELECT CHFID,CHFNOM FROM chauffeur where CHFID=; : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1) 
ERREUR SQL : 16 May 2017 - 15:59:57.000000 --> INSERT INTO tournee (TRNNUM, TRNDTE, CHFID, VEHIMMAT, TRNARCHAUFFEUR, TRNCOMMENTAIRE) 
		VALUES ('10','19/05/2017', '31', 'AA-225-AA', '25/05/2017 08H00', ''); : (Duplicate entry '10' for key 'PRIMARY') 
ERREUR SQL : 16 May 2017 - 16:01:16.000000 --> INSERT INTO tournee (TRNNUM, TRNDTE, CHFID, VEHIMMAT, TRNARCHAUFFEUR, TRNCOMMENTAIRE) 
		VALUES ('10','24/05/2017', '31', 'AA-223-AA', '24/05/2017 10H00', ''); : (Duplicate entry '10' for key 'PRIMARY') 
ERREUR SQL : 16 May 2017 - 16:08:59.000000 --> INSERT INTO tournee (TRNNUM, TRNDTE, CHFID, VEHIMMAT, TRNARCHAUFFEUR, TRNCOMMENTAIRE) 
		VALUES ('10','18/05/2017', '3', 'AA-220-AA', '26/05/2017 00H00', ''); : (Duplicate entry '10' for key 'PRIMARY') 
ERREUR SQL : 16 May 2017 - 16:09:07.000000 --> INSERT INTO tournee (TRNNUM, TRNDTE, CHFID, VEHIMMAT, TRNARCHAUFFEUR, TRNCOMMENTAIRE) 
		VALUES ('10','11/05/2017', '3', 'AA-220-AA', '18/05/2017 00H00', ''); : (Duplicate entry '10' for key 'PRIMARY') 
ERREUR SQL : 16 May 2017 - 16:11:27.000000 --> INSERT INTO etape (TRNNUM, ETPID, LIEUID, ETPCOMMENTAIRE, ETPHREDEBUT, ETPHREFIN) VALUES ('11','10','5', "a l heure", "2017-05-18 07:00:00", '2017-05-18 09:00:00'); : (Duplicate entry '11-10' for key 'PRIMARY') 
ERREUR SQL : 16 May 2017 - 16:14:06.000000 --> INSERT INTO etape (TRNNUM, ETPID, LIEUID, ETPCOMMENTAIRE, ETPHREDEBUT, ETPHREFIN) VALUES ('11','10','4', "", "2017-05-25 00:00:00", '2017-05-25 00:00:00'); : (Duplicate entry '11-10' for key 'PRIMARY') 
ERREUR SQL : 16 May 2017 - 16:34:07.000000 --> INSERT INTO etape (TRNNUM, ETPID, LIEUID, ETPCOMMENTAIRE, ETPHREDEBUT, ETPHREFIN) VALUES ('11','13','5', "", "2017-05-18 09:00:00", '2017-05-18 10:00:00'); : (Duplicate entry '11-13' for key 'PRIMARY') 
