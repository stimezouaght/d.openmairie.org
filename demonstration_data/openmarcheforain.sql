
--
--\i tests/data/pgsql/install_tests.sql
--
SET search_path = openmf, public, pg_catalog;

-- Utilisateur super renommé demo
UPDATE om_utilisateur 
SET login = 'demo'
   , passwd = 'fe01ce2a7fbac8fafaed7c982a04e229'
WHERE login = 'super'
;
-- Mot de passe générique supprimé pour les autres comptes
UPDATE om_utilisateur 
SET passwd = '6a2da2d17406bef69671c5a1ef2dde7f'
    , email = 'nospam@openmairie.org'
WHERE login != 'demo';
--
delete from om_droit where libelle='password';
delete from om_droit where libelle='gen';
delete from om_droit where libelle LIKE 'om_collectivite%';
delete from om_droit where libelle LIKE 'om_utilisateur%';
delete from om_droit where libelle LIKE 'om_profil%';
delete from om_droit where libelle LIKE 'om_droit%';
delete from om_droit where libelle LIKE 'om_sousetat%';
delete from om_droit where libelle LIKE 'om_requete%';
