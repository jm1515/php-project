#------------------------------------------------------------
# Insertion: Insertion des utilisateurs
#------------------------------------------------------------

CALL insert_user_opasenior('bob.dupont@hotmail.fr', '9688FB3D87A6595AF2F8D284DEC54A9AF94E5D080ABF1D3B34777AEEE8ECE545', 1, 'Bob', 'Dupont', '15 rue de dupont', '78434', 'City', '03-05-1965', '0694759374');
# password : bobby

CALL insert_pro('michael.jackson@hotmail.fr', '76061567CE8CE01F3A9AD82DAD6EBA38AA844CF95B8F94A75BDEE88731648F59');
# password : bobby

INSERT INTO account(account_email, account_password, account_is_valid, account_type)
VALUES('admin@mail.fr', '5365b72690a4b5aed3e90de4557afc76c0d36f7cf656dcce01ae881c49acfaee', 1, 2);

#------------------------------------------------------------
# Insertion: Services
#------------------------------------------------------------

INSERT INTO service(service_id, service_name, service_description)
VALUES (1, 'Unité Alzheimer', '');

INSERT INTO service(service_id, service_name, service_description)
VALUES (2, 'PASA','Pôle d activité et de soins adaptés');

INSERT INTO service(service_id, service_name, service_description)
VALUES (3, 'Unité soin longue durée', '');


#------------------------------------------------------------
# Insertion: Status
#------------------------------------------------------------

INSERT INTO residence_status(residence_status_id, residence_status_name)
VALUES (1, 'EHPAD');

INSERT INTO residence_status(residence_status_id, residence_status_name)
VALUES (2, 'APL');

INSERT INTO residence_status(residence_status_id, residence_status_name)
VALUES (3, 'Habilité aides sociales');


#------------------------------------------------------------
# Insertion: Status légaux
#------------------------------------------------------------

INSERT INTO legal_status(legal_status_id, legal_status_name)
VALUES (1, 'SAS');

INSERT INTO legal_status(legal_status_id, legal_status_name)
VALUES (2, 'SARL');


#------------------------------------------------------------
# Insertion: Groupe de résidence
#------------------------------------------------------------

INSERT INTO residence_groupe(residence_groupe_id, residence_groupe_name)
VALUES (1, 'Korian');

INSERT INTO residence_groupe(residence_groupe_id, residence_groupe_name)
VALUES (2, 'Orpea');


#------------------------------------------------------------
# Insertion: Insertion des résidences
#------------------------------------------------------------

INSERT INTO residence(residence_id, residence_name, residence_address, residence_postal_code, residence_city, residence_phone_number, residence_email, residence_residence_groupe_id, residence_legal_status_id, residence_pro_id, residence_price)
VALUES (1, 'Maison de retraite la rose des vents', '1289 rue Edouard Herriot', '78480', 'Jassans Riottier', '0194839458', 'larosedesvents@gmail.com', 1, 2, 1, 2000);

INSERT INTO residence(residence_id, residence_name, residence_address, residence_postal_code, residence_city, residence_phone_number, residence_email, residence_residence_groupe_id, residence_legal_status_id, residence_price)
VALUES (2, 'Maison de retraite repos peronnas', 'Chemin des Carronnieres', '92200', 'Peronnas', '0138943829', 'peronnas@gmail.com', 2, 1, 1500);

INSERT INTO residence(residence_id, residence_name, residence_address, residence_postal_code, residence_city, residence_phone_number, residence_email, residence_residence_groupe_id, residence_legal_status_id, residence_price)
VALUES (3, 'Maison de retraite bon repos bourg-en-bresse', '2 rue du dr roux', '92300', 'Bourg en Bresse', '0194837463', 'bonrepos@gmail.com', 2, 1, 3500);


#------------------------------------------------------------
# Insertion: Insertion du lien entre Résidences et Status
#------------------------------------------------------------

INSERT INTO contains(contains_residence_id, contains_residence_status_id)
VALUES (1, 1);

INSERT INTO contains(contains_residence_id, contains_residence_status_id)
VALUES (1, 2);

INSERT INTO contains(contains_residence_id, contains_residence_status_id)
VALUES (2, 3);

INSERT INTO contains(contains_residence_id, contains_residence_status_id)
VALUES (3, 2);


#------------------------------------------------------------
# Insertion: Insertion des services pour les résidences
#------------------------------------------------------------

INSERT INTO offer(offer_residence_id, offer_service_id)
VALUES (1, 1);

INSERT INTO offer(offer_residence_id, offer_service_id)
VALUES (2, 2);

INSERT INTO offer(offer_residence_id, offer_service_id)
VALUES (2, 3);

INSERT INTO offer(offer_residence_id, offer_service_id)
VALUES (3, 2);

INSERT INTO offer(offer_residence_id, offer_service_id)
VALUES (3, 1);

#------------------------------------------------------------
# Insertion: Insertion des status de candidature
#------------------------------------------------------------

INSERT INTO status_candidature(status_candidature_id, status_candidature_name)
VALUES (1, 'Envoyée');

INSERT INTO status_candidature(status_candidature_id, status_candidature_name)
VALUES (2, 'Acceptée');

INSERT INTO status_candidature(status_candidature_id, status_candidature_name)
VALUES (3, 'Refusée');

#------------------------------------------------------------
# Insertion: Insertion candidature
#------------------------------------------------------------

CALL insert_candidature(1, 1);

CALL insert_candidature(1, 2);

#------------------------------------------------------------
# Insertion: Accept candidature
#------------------------------------------------------------

CALL accept_candidature(1, 1);

#------------------------------------------------------------
# Insertion: Insertion commentaire
#------------------------------------------------------------

CALL insert_comment_residence(1, 1, 'Bob Dupont', 'Très bonne résidence. !', 4);