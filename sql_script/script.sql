#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

DROP DATABASE IF EXISTS `opasenior`;

CREATE DATABASE `opasenior`
  CHARACTER SET utf8
  COLLATE utf8_general_ci;

#------------------------------------------------------------
# Table: Account
#------------------------------------------------------------

CREATE TABLE account(
        account_id   Int  Auto_increment  NOT NULL ,
        account_email        Varchar (50) NOT NULL ,
        account_password     Varchar (256) NOT NULL ,
        account_is_valid     Boolean NOT NULL DEFAULT FALSE,
        account_type Int NOT NULL DEFAULT 0,
        account_key Varchar(32)
	,CONSTRAINT Account_PK PRIMARY KEY (account_id)
	,UNIQUE (account_email)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Residence_groupe
#------------------------------------------------------------

CREATE TABLE residence_groupe(
        residence_groupe_id   Int  Auto_increment  NOT NULL ,
        residence_groupe_name Varchar (30) NOT NULL
	,CONSTRAINT Residence_groupe_PK PRIMARY KEY (residence_groupe_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Service
#------------------------------------------------------------

CREATE TABLE service(
        service_id   Int  Auto_increment  NOT NULL ,
        service_name Varchar (30) NOT NULL ,
        service_description  Text
	,CONSTRAINT Service_PK PRIMARY KEY (service_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Guardian
#------------------------------------------------------------

CREATE TABLE guardian(
        guardian_id  Int  Auto_increment  NOT NULL ,
        guardian_firstname    Varchar (30) NOT NULL ,
        guardian_lastname     Varchar (30) NOT NULL ,
        guardian_phone_number Varchar (15) NOT NULL ,
        guardian_email        Varchar (30) NOT NULL
	,CONSTRAINT Guardian_PK PRIMARY KEY (guardian_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User_opasenior
#------------------------------------------------------------

CREATE TABLE resident(
        resident_id               Int Auto_increment NOT NULL ,
        resident_account_id       Int NOT NULL ,
        resident_gender           Int DEFAULT 1,
        resident_firstname        Varchar (20) NOT NULL ,
        resident_lastname         Varchar (20) NOT NULL ,
        resident_address          Varchar (50) NOT NULL ,
        resident_postal           Varchar (10) NOT NULL ,
        resident_dossier          Blob,
        resident_city             Varchar (50) NOT NULL ,
        resident_date_of_birth    Date NOT NULL ,
        resident_phone_number     Varchar (15) NOT NULL ,
        resisent_GIR              Int ,
        resident_financement_type Varchar (15) ,
        resident_social_care_file Boolean DEFAULT FALSE,
        resident_guardian_id      Int
	,CONSTRAINT User_opasenior_PK PRIMARY KEY (resident_id)

	,CONSTRAINT User_opasenior_Account_FK FOREIGN KEY (resident_account_id) REFERENCES account(account_id)
	,CONSTRAINT User_opasenior_Guardian0_FK FOREIGN KEY (resident_guardian_id) REFERENCES guardian(guardian_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Pro
#------------------------------------------------------------

CREATE TABLE pro(
        pro_id       Int Auto_increment NOT NULL ,
        pro_account_id   Int NOT NULL
	,CONSTRAINT Pro_PK PRIMARY KEY (pro_id)

	,CONSTRAINT Pro_Account_FK FOREIGN KEY (pro_account_id) REFERENCES account(account_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: legal_status
#------------------------------------------------------------

CREATE TABLE legal_status(
        legal_status_id Int  Auto_increment  NOT NULL ,
        legal_status_name     Varchar (50) NOT NULL
	,CONSTRAINT legal_status_PK PRIMARY KEY (legal_status_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: residence_status
#------------------------------------------------------------

CREATE TABLE residence_status(
        residence_status_id   Int  Auto_increment  NOT NULL ,
        residence_status_name Varchar (50) NOT NULL
	,CONSTRAINT residence_status_PK PRIMARY KEY (residence_status_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Residence
#------------------------------------------------------------

CREATE TABLE residence(
        residence_id        Int  Auto_increment  NOT NULL ,
        residence_name      Varchar (50) NOT NULL ,
        residence_address             Varchar (50) NOT NULL ,
        residence_postal_code         Varchar (5) NOT NULL ,
        residence_city                Varchar (50) NOT NULL ,
        residence_phone_number        Varchar (50) NOT NULL ,
        residence_email               Varchar (50) NOT NULL ,
        residence_price               Float NOT NULL ,
        residence_icon      Blob ,
        residence_is_available        Boolean DEFAULT TRUE ,
        residence_residence_groupe_id         Int NOT NULL ,
        residence_pro_id              Int ,
        residence_legal_status_id     Int NOT NULL
	,CONSTRAINT Residence_PK PRIMARY KEY (residence_id)

	,CONSTRAINT Residence_Residence_groupe_FK FOREIGN KEY (residence_residence_groupe_id) REFERENCES residence_groupe(residence_groupe_id)
	,CONSTRAINT Residence_Pro0_FK FOREIGN KEY (residence_pro_id) REFERENCES pro(pro_id)
	,CONSTRAINT Residence_legal_status1_FK FOREIGN KEY (residence_legal_status_id) REFERENCES legal_status(legal_status_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Residence_picture
#------------------------------------------------------------

CREATE TABLE residence_picture(
        residence_picture_id   Int  Auto_increment  NOT NULL ,
        residence_picture_residence_id  INT NOT NULL,
        residence_picture_data mediumblob,
        residence_picture_order INT NOT NULL DEFAULT 1
	,CONSTRAINT residence_picture_PK PRIMARY KEY (residence_picture_id)
	,CONSTRAINT Residence_picture_Residence_FK FOREIGN KEY (residence_picture_residence_id) REFERENCES residence(residence_id)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: Contains
#------------------------------------------------------------

CREATE TABLE contains(
        contains_residence_id Int NOT NULL ,
        contains_residence_status_id Int NOT NULL
	,CONSTRAINT Contains_PK PRIMARY KEY (contains_residence_id,contains_residence_status_id)

	,CONSTRAINT Contains_Residence_FK FOREIGN KEY (contains_residence_id) REFERENCES residence(residence_id)
	,CONSTRAINT Contains_Residence_status_FK FOREIGN KEY (contains_residence_status_id) REFERENCES residence_status(residence_status_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Status_candidature
#------------------------------------------------------------

CREATE TABLE status_candidature(
        status_candidature_id   Int  Auto_increment  NOT NULL ,
        status_candidature_name Varchar (50) NOT NULL
	,CONSTRAINT Status_candidature_PK PRIMARY KEY (status_candidature_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Candidature
#------------------------------------------------------------

CREATE TABLE candidature(
        candidature_resident_id               Int NOT NULL ,
        candidature_residence_id          Int NOT NULL ,
        candidature_status_id Int NOT NULL ,
        candidature_date      Date NOT NULL
	,CONSTRAINT Candidature_PK PRIMARY KEY (candidature_resident_id,candidature_residence_id,candidature_status_id)

	,CONSTRAINT Candidature_User_opasenior_FK FOREIGN KEY (candidature_resident_id) REFERENCES resident(resident_id)
	,CONSTRAINT Candidature_Residence0_FK FOREIGN KEY (candidature_residence_id) REFERENCES residence(residence_id)
	,CONSTRAINT Candidature_Status_candidature1_FK FOREIGN KEY (candidature_status_id) REFERENCES status_candidature(status_candidature_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Offers
#------------------------------------------------------------

CREATE TABLE offer(
        offer_residence_id Int NOT NULL ,
        offer_service_id   Int NOT NULL
	,CONSTRAINT Offers_PK PRIMARY KEY (offer_residence_id,offer_service_id)

	,CONSTRAINT Offers_Residence_FK FOREIGN KEY (offer_residence_id) REFERENCES residence(residence_id)
	,CONSTRAINT Offers_Service0_FK FOREIGN KEY (offer_service_id) REFERENCES service(service_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User_residence_history
#------------------------------------------------------------

CREATE TABLE history_user_residence(
        history_user_residence_resident_id      Int NOT NULL ,
        history_user_residence_residence_id Int NOT NULL ,
        history_user_residence_entry_date   Date NOT NULL ,
        history_user_residence_exit_date    Date
	,CONSTRAINT User_residence_history_PK PRIMARY KEY (history_user_residence_resident_id,history_user_residence_residence_id)

	,CONSTRAINT User_residence_history_User_opasenior_FK FOREIGN KEY (history_user_residence_resident_id) REFERENCES resident(resident_id)
	,CONSTRAINT User_residence_history_Residence0_FK FOREIGN KEY (history_user_residence_residence_id) REFERENCES residence(residence_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Comment
#------------------------------------------------------------

CREATE TABLE comment(
        comment_resident_id      Int NOT NULL ,
        comment_residence_id    Int NOT NULL ,
        comment_publishing_date Date NOT NULL ,
        comment_title           Varchar (20) NOT NULL ,
        comment_message         Varchar (255) NOT NULL ,
        comment_rate            Int NOT NULL
	,CONSTRAINT Comment_PK PRIMARY KEY (comment_resident_id,comment_residence_id)

	,CONSTRAINT Comment_User_opasenior_FK FOREIGN KEY (comment_resident_id) REFERENCES resident(resident_id)
	,CONSTRAINT Comment_Residence0_FK FOREIGN KEY (comment_residence_id) REFERENCES residence(residence_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
#        PROCEDURES
#------------------------------------------------------------

DELIMITER $$

#------------------------------------------------------------
# Procedure: Insertion_pro
#------------------------------------------------------------

CREATE PROCEDURE insert_pro (
IN account_email VARCHAR(50),
IN account_password VARCHAR(256)
)
BEGIN
    DECLARE user_opasenior_id_account INT;

    INSERT INTO account(account_email, account_password, account_type)
    VALUES (account_email, account_password, 1);

    SET user_opasenior_id_account = LAST_INSERT_ID();

    INSERT INTO pro(pro_account_id)
    VALUES (user_opasenior_id_account);

END
$$


#------------------------------------------------------------
# Procedure: Insertion_user_opasenuir
#------------------------------------------------------------

CREATE PROCEDURE insert_user_opasenior (
IN account_email VARCHAR(50),
IN account_password VARCHAR(256),

IN user_opasenior_gender VARCHAR(2),
IN user_opasenior_firstname VARCHAR(20),
IN user_opasenior_lastname VARCHAR(20),
IN user_opasenior_address VARCHAR(50),
IN user_opasenior_postal VARCHAR(50),
IN user_opasenior_city VARCHAR(50),
IN user_opasenior_date_of_birth VARCHAR(10) ,
IN user_opasenior_phone_number VARCHAR(15)
)
BEGIN
    DECLARE user_opasenior_id_account INT;

    INSERT INTO account(account_email, account_password)
    VALUES (account_email, account_password);

    SET user_opasenior_id_account = LAST_INSERT_ID();

    INSERT INTO resident(resident_account_id, resident_gender, resident_firstname, resident_lastname, resident_address, resident_postal, resident_city, resident_date_of_birth, resident_phone_number)
    VALUES (user_opasenior_id_account, user_opasenior_gender, user_opasenior_firstname, user_opasenior_lastname, user_opasenior_address, user_opasenior_postal, user_opasenior_city, STR_TO_DATE(user_opasenior_date_of_birth, '%d-%m-%Y'), user_opasenior_phone_number);

END
$$


#------------------------------------------------------------
# Procedure: Insertion_user_opasenior_with_guardian
#------------------------------------------------------------

CREATE PROCEDURE insert_user_opasenior_with_guardian (
IN account_email VARCHAR(50),
IN account_password VARCHAR(256),

IN user_opasenior_gender VARCHAR(2),
IN user_opasenior_firstname VARCHAR(20),
IN user_opasenior_lastname VARCHAR(20),
IN user_opasenior_address VARCHAR(50),
IN user_opasenior_postal VARCHAR(50),
IN user_opasenior_city VARCHAR(50),
IN user_opasenior_date_of_birth VARCHAR(10) ,
IN user_opasenior_phone_number VARCHAR(15),

IN guardian_firstname VARCHAR(30),
IN guardian_lastname VARCHAR(30),
IN guardian_phone_number VARCHAR(15),
IN guardian_email VARCHAR(30)
)
BEGIN
    DECLARE user_opasenior_id_account INT;
    DECLARE guardian_id_account INT;

    INSERT INTO account(account_email, account_password)
    VALUES (account_email, account_password);

    SET user_opasenior_id_account = LAST_INSERT_ID();

    INSERT INTO guardian(guardian_firstname, guardian_lastname, guardian_phone_number, guardian_email)
    VALUES (guardian_firstname, guardian_lastname, guardian_phone_number, guardian_email);

    SET guardian_id_account = LAST_INSERT_ID();

    INSERT INTO resident(resident_account_id, resident_gender, resident_firstname, resident_lastname, resident_address, resident_postal, resident_city, resident_date_of_birth, resident_phone_number, resident_guardian_id)
    VALUES (user_opasenior_id_account, user_opasenior_gender, user_opasenior_firstname, user_opasenior_lastname, user_opasenior_address, user_opasenior_postal, user_opasenior_city, STR_TO_DATE(user_opasenior_date_of_birth, '%d-%m-%Y'), user_opasenior_phone_number, guardian_id_account);

END
$$


#------------------------------------------------------------
# Procedure: get_residence_by_service
#------------------------------------------------------------

CREATE PROCEDURE get_residence_by_service (
IN service_id INT
)
BEGIN

    SELECT *
    FROM residence
    WHERE residence_id IN (
      SELECT offer_residence_id
      FROM offer
      WHERE offer_service_id = service_id
    );


END
$$


#------------------------------------------------------------
# Procedure: Search_residence_by_criterias
#------------------------------------------------------------

CREATE PROCEDURE search_residence_by_criterias (
IN service_id_p VARCHAR(50),
IN residence_postal_code_p VARCHAR(30),
IN residence_price_min_p VARCHAR(30),
IN residence_price_max_p VARCHAR(30),
IN residence_name_p VARCHAR(50)

)
BEGIN

    SELECT *
    FROM residence
    LEFT JOIN residence_picture
      ON residence.residence_id = residence_picture.residence_picture_residence_id
    WHERE
        (service_id_p IS NULL OR residence_id IN (
          SELECT offer_residence_id
          FROM offer
          WHERE offer_service_id = service_id_p)
        )
    AND (residence_postal_code_p IS NULL OR residence_postal_code LIKE CONCAT(residence_postal_code_p , '%'))
    AND (residence_price_min_p IS NULL OR residence_price >= residence_price_min_p)
    AND (residence_price_max_p IS NULL OR residence_price <= residence_price_max_p)
    AND (residence_name_p IS NULL OR residence_name LIKE CONCAT('%', residence_name_p , '%'));

END
$$


#------------------------------------------------------------
# Procedure: Search_services_by_residence
#------------------------------------------------------------

CREATE PROCEDURE search_services_by_residence (
IN residence_id_p INT
)
BEGIN
    SELECT *
    FROM service
    WHERE service_id IN (
      SELECT offer_service_id
      FROM offer
      WHERE offer_residence_id = residence_id_p
    )
    ORDER BY service_name;
END
$$


#------------------------------------------------------------
# Procedure: Insert_comment_residence
#------------------------------------------------------------

CREATE PROCEDURE insert_comment_residence (
IN residence_id_p INT,
IN resident_id_p INT,
IN comment_title_p VARCHAR(100),
IN comment_message_p VARCHAR(500),
IN comment_rate_p INT(5)
)
BEGIN
    DECLARE number_comment INT;
    DECLARE number_residence INT;

    SELECT COUNT(*) INTO number_comment
    FROM comment
    WHERE comment_resident_id = resident_id_p AND comment_residence_id = residence_id_p;


    SELECT COUNT(*) INTO number_residence
    FROM history_user_residence
    WHERE history_user_residence_resident_id = resident_id_p
      AND history_user_residence_residence_id = residence_id_p;

    IF number_comment = 0 AND number_residence > 0 THEN
      INSERT INTO comment(comment_resident_id, comment_residence_id, comment_title, comment_publishing_date, comment_message, comment_rate)
      VALUES (resident_id_p, residence_id_p, comment_title_p, NOW(), comment_message_p, comment_rate_p);
    ELSE
      SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'comment already exist or resident never join the residence';
    END IF;
END
$$


#------------------------------------------------------------
# Procedure: Insert_candidature
#------------------------------------------------------------

CREATE PROCEDURE insert_candidature (
IN resident_id_p INT,
IN residence_id_p INT
)
BEGIN
    DECLARE number_candidature INT;

    SELECT COUNT(*) INTO number_candidature
    FROM candidature
    WHERE candidature_resident_id = resident_id_p
    AND candidature_residence_id = residence_id_p
    AND candidature_status_id = 0;

    IF number_candidature = 0 THEN
      INSERT INTO candidature(candidature_resident_id, candidature_residence_id, candidature_status_id, candidature_date)
      VALUES (resident_id_p, residence_id_p, 1, NOW());
    ELSE
      SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'candidature already exist';
    END IF;
END
$$


#------------------------------------------------------------
# Procedure: Get_comment_by_residence
#------------------------------------------------------------

CREATE PROCEDURE get_comment_by_residence (
IN residence_id_p INT
)
BEGIN
    SELECT *
    FROM comment
    WHERE comment_residence_id = residence_id_p;
END
$$


#------------------------------------------------------------
# Procedure: Get_candidature_by_residence
#------------------------------------------------------------

CREATE PROCEDURE get_candidatures_by_residence (
IN residence_id_p INT
)
BEGIN
    SELECT *
    FROM candidature
    INNER JOIN status_candidature
      ON status_candidature_id = candidature.candidature_status_id
    WHERE candidature_residence_id = residence_id_p;
END
$$


#------------------------------------------------------------
# Procedure: Get_candidature_by_resident
#------------------------------------------------------------

CREATE PROCEDURE get_candidatures_by_resident (
IN resident_id_p INT
)
BEGIN
    SELECT *
    FROM candidature
    INNER JOIN status_candidature
      ON status_candidature_id = candidature.candidature_status_id
    INNER JOIN residence
      ON residence_id = candidature.candidature_residence_id
    WHERE candidature_resident_id = resident_id_p;
END
$$


#------------------------------------------------------------
# Procedure: Accept_candidature
#------------------------------------------------------------

CREATE PROCEDURE accept_candidature (
IN resident_id_p INT,
IN residence_id_p INT
)
BEGIN
    UPDATE candidature
    SET candidature_status_id = 2
    WHERE candidature_residence_id = residence_id_p
      AND candidature_resident_id = resident_id_p;

    INSERT INTO history_user_residence(history_user_residence_resident_id, history_user_residence_residence_id, history_user_residence_entry_date, history_user_residence_exit_date)
    VALUES (resident_id_p, residence_id_p, NOW(), NULL);
END
$$


#------------------------------------------------------------
# Procedure: Refuse_candidature
#------------------------------------------------------------

CREATE PROCEDURE refuse_candidature (
IN resident_id_p INT,
IN residence_id_p INT
)
BEGIN
    UPDATE candidature
    SET candidature_status_id = 3
    WHERE candidature_residence_id = residence_id_p
      AND candidature_resident_id = resident_id_p;
END
$$

#------------------------------------------------------------
# Procedure: Statistics
#------------------------------------------------------------

CREATE PROCEDURE statistics ()
BEGIN
    DECLARE nb_etablissements INT;
    DECLARE nb_avis_deposes INT;

    SELECT COUNT(*)
    INTO nb_etablissements
    FROM residence;

    SELECT COUNT(*)
    INTO nb_avis_deposes
    FROM comment;

    SELECT nb_etablissements, nb_avis_deposes;
END
$$

#------------------------------------------------------------
# Procedure: Get_best_residences
#------------------------------------------------------------

CREATE PROCEDURE get_best_residences()
BEGIN
    SELECT residence_id, residence_name, residence_city, T.residence_rate, residence_picture_data
    FROM (
      SELECT comment_residence_id, AVG(comment_rate) AS residence_rate
      FROM comment
      GROUP BY comment_residence_id
      ORDER BY residence_rate
    ) AS T
    RIGHT JOIN residence
      ON residence_id = T.comment_residence_id
    LEFT JOIN residence_picture
      ON residence_picture_residence_id = residence_id
        AND residence_picture_order = 1
    LIMIT 3;
END
$$

#------------------------------------------------------------
# Procedure: Get_picture_by_residence
#------------------------------------------------------------

CREATE PROCEDURE get_picture_by_residence(
IN residence_id_p INT,
IN residence_picture_order_p INT
)
BEGIN
    SELECT *
    FROM residence_picture
    WHERE residence_picture_residence_id = residence_id_p
    AND residence_picture_order = residence_picture_order_p;
END
$$

#------------------------------------------------------------
# Procedure: Get_candidatures_by_pro_email
#------------------------------------------------------------

CREATE PROCEDURE get_candidatures_by_pro_email (
IN pro_email_p VARCHAR(50)
)
BEGIN
    SELECT *
    FROM account a
    INNER JOIN pro p
      ON a.account_id = p.pro_account_id
    INNER JOIN residence r
      ON r.residence_pro_id = p.pro_id
    INNER JOIN candidature c
      ON c.candidature_residence_id = r.residence_id
    INNER JOIN status_candidature s
      ON s.status_candidature_id = c.candidature_status_id
    WHERE a.account_email = pro_email_p;
END
$$

#------------------------------------------------------------
# Procedure: Insert_residence
#------------------------------------------------------------

CREATE PROCEDURE insert_residence (
IN residence_name_p VARCHAR(50),
IN residence_address_p VARCHAR(50),
IN residence_postal_code_p VARCHAR(50),
IN residence_city_p VARCHAR(50),
IN residence_phone_number_p VARCHAR(50),
IN residence_email_p VARCHAR(50),
IN residence_price_p VARCHAR(50),
IN residence_residence_groupe_id_p VARCHAR(50),
IN account_id_p INT,
IN residence_legal_status_id_p VARCHAR(50),
IN residence_picture Mediumblob,
IN residence_status_list_p VARCHAR(50),
IN residence_service_list_p VARCHAR(50)
)
BEGIN
    DECLARE pro_id INT;
    DECLARE residence_id INT;

    SELECT pro_id INTO pro_id
    FROM pro
    INNER JOIN account
      ON pro.pro_account_id = account.account_id
    WHERE account.account_id = account_id_p;

    INSERT INTO residence(residence_name, residence_address, residence_postal_code, residence_city, residence_phone_number, residence_email, residence_price, residence_residence_groupe_id, residence_pro_id, residence_legal_status_id)
    VALUES(residence_name_p, residence_address_p, residence_postal_code_p, residence_city_p, residence_phone_number_p, residence_email_p, residence_price_p, residence_residence_groupe_id_p, pro_id, residence_legal_status_id_p);

    SET residence_id = LAST_INSERT_ID();

    INSERT INTO residence_picture(residence_picture_residence_id, residence_picture_data)
    VALUES (residence_id, residence_picture);

    INSERT INTO offer(offer_residence_id, offer_service_id)
    SELECT residence_id, service_id
    FROM service
    WHERE FIND_IN_SET(service_id, residence_service_list_p);

    INSERT INTO contains(contains_residence_id, contains_residence_status_id)
    SELECT residence_id, residence_status_id
    FROM residence_status
    WHERE FIND_IN_SET(residence_status_id, residence_status_list_p);
END
$$

DELIMITER ;