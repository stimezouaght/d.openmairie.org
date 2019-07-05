--
\i tests/data/pgsql/install_tests.sql

--
SET search_path = opencimetiere, public, pg_catalog;

--
DELETE FROM om_utilisateur;
INSERT INTO om_utilisateur (om_utilisateur, nom, email, login, pwd, om_collectivite, om_type, om_profil) 
VALUES (nextval('om_utilisateur_seq'), 'Démonstration', 'nospam@openmairie.org', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 1, 'db', (select om_profil from om_profil where om_profil.libelle='ADMINISTRATEUR'));

--
delete from om_droit where libelle='password';
delete from om_droit where libelle='gen';
delete from om_droit where libelle LIKE 'om_collectivite%';
delete from om_droit where libelle LIKE 'om_utilisateur%';
delete from om_droit where libelle LIKE 'om_profil%';
delete from om_droit where libelle LIKE 'om_droit%';
delete from om_droit where libelle LIKE 'om_sousetat%' AND libelle <> 'om_sousetat_consulter';
delete from om_droit where libelle LIKE 'om_requete%' AND libelle <> 'om_requete_consulter';
																       
