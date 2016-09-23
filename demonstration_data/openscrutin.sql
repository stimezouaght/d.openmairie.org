--
SET search_path = openscrutin, public, pg_catalog;

--
update om_utilisateur 
	set om_profil=(select om_profil from om_profil where om_profil.libelle='SUPER UTILISATEUR')
	where om_utilisateur.login='demo';

--
delete from om_droit where libelle='password';
delete from om_droit where libelle='om_sousetat';
delete from om_droit where libelle='om_etat';
delete from om_droit where libelle='om_lettretype';
