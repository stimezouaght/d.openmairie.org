--
\i tests/data/pgsql/install_tests.sql

--
SET search_path = openaria, public, pg_catalog;

--
DELETE FROM om_utilisateur;
INSERT INTO om_utilisateur (om_utilisateur, nom, email, login, pwd, om_collectivite, om_type, om_profil) 
VALUES (nextval('om_utilisateur_seq'), 'Démonstration', 'nospam@openmairie.org', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 1, 'db', 1);
update om_utilisateur set om_profil=(select om_profil from om_profil where om_profil.libelle='ADMINISTRATEUR') where om_utilisateur.login='demo';

--
delete from om_droit where libelle='om_utilisateur';
delete from om_droit where libelle='om_profil';
delete from om_droit where libelle='om_droit';
delete from om_droit where libelle='password';
delete from om_droit where libelle='om_sousetat';
delete from om_droit where libelle='om_requete';
