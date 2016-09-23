--
SET search_path = opencourrier, public, pg_catalog;

--
INSERT INTO om_utilisateur (om_utilisateur, nom, email, login, pwd, om_collectivite, om_type, om_profil, service) 
VALUES (nextval('om_utilisateur_seq'), 'Démonstration', 'contact@openmairie.org', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 1, 'db', 2, 2);
update om_utilisateur set om_profil=(select om_profil from om_profil where om_profil.libelle='SUPER UTILISATEUR') where om_utilisateur.login='demo';

--
delete from om_droit where libelle='password';
delete from om_droit where libelle='om_sousetat';
