--
\i tests/data/pgsql/install_tests.sql

--
SET search_path = openaria, public, pg_catalog;

--
DELETE FROM acteur;
DELETE FROM om_utilisateur;

--
INSERT INTO om_utilisateur (om_utilisateur, nom, email, login, pwd, om_collectivite, om_type, om_profil)
    VALUES 
    (
      nextval('om_utilisateur_seq'),
      'Démonstration', 'nospam@openmairie.org', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 1, 'db',
      (select om_profil from om_profil where om_profil.libelle='ADMINISTRATEUR')
    );
INSERT INTO acteur (acteur, nom_prenom, om_utilisateur, service, role, acronyme, couleur, om_validite_debut, om_validite_fin, reference)
    VALUES 
    (
     nextval('acteur_seq'), 
     'Luce DAVISO', 
     (SELECT om_utilisateur FROM om_utilisateur WHERE login = 'demo'),
     (SELECT service FROM service WHERE code = 'SI'),
     'cadre', 'LDA', NULL, NULL, NULL, NULL
    );

--
delete from om_droit where libelle='password';
delete from om_droit where libelle='gen';
delete from om_droit where libelle LIKE 'om_collectivite%';
delete from om_droit where libelle LIKE 'om_utilisateur%';
delete from om_droit where libelle LIKE 'om_profil%';
delete from om_droit where libelle LIKE 'om_droit%';
delete from om_droit where libelle LIKE 'om_sousetat%' AND libelle <> 'om_sousetat_consulter';
delete from om_droit where libelle LIKE 'om_requete%' AND libelle <> 'om_requete_consulter';
