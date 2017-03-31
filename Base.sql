
/*create TABLE membre
(
	id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	login varchar(32),
	pass text
);*/

create table client
(
	id_client INTEGER unsigned not null AUTO_INCREMENT primary key,
	nom varchar(32),
	prenom varchar(32),
	qualite varchar(32),
	composante varchar(32),
	laboratoire varchar(32),
	tel text,
	mail varchar(32)
);

/*insert into membre (login,pass) values('Assan','5c3dfbf6fb4939d85a76eaff59b057f7f01b0b0b');
insert into membre (login,pass) values('Mehdi','5c3dfbf6fb4939d85a76eaff59b057f7f01b0b0b');*/

create table coordinateur
(
	id_co INTEGER unsigned not null AUTO_INCREMENT primary key,
	nom_co varchar(32),
	prenom_co varchar(32),
	qualite_co varchar(32),
	composante_co varchar(32),
	laboratoire_co varchar(32),
	tel_co text,
	mail_co varchar(32),
	id_publication integer references publication,
	id_manif integer references manifestation
);

create table publication
(
	id_client integer unsigned not null references client,
	id_publication integer unsigned not null AUTO_INCREMENT primary key,
	type_publication text,
	nom_publication text,
	titre_ouvrage text,
	date_prevue text,
	editeur text,
	direction text,
	collaborateur text,
	nb_contribuable_Paris13 integer,
	nb_contribuable_France integer,
	nb_contribuable_Etranger integer,
	nb_contribuable_Doctorants integer,
	mode_selection_contribution text,
	appui_logistique text
);

create table financement
(
	id_financement INTEGER unsigned not null AUTO_INCREMENT primary key,
	id_publication integer references publication,
	id_manif integer references manifestation,
	montant text,
	montant_editeur text,
	subvention_demande_au_CS text,
	co_financement text,
	virement_laboratoire text,
	gestion_financiere_bred text
);

create table manifestation
(
	id_manif INTEGER unsigned not null AUTO_INCREMENT primary key,
	nom_manif text,
	date_manif text,
	lieu text,
	caractere varchar(32),
	site_web text,
	id_client integer unsigned not null references client
);


create table organisateur
(
	id_manif integer references manifestation,
	responsables varchar(32),
	addresse text,
	tel text,
	mail text,
	co_responsable varchar(32),
	addresse_co_responsable text,
	tel_co_responsable text,
	mail_co_responsable text,
	conditions_organisation text
);

create table participants
(
	id_manif integer references manifestation,
	nb_participants integer,
	dont_payants integer,
	dont_non_payants integer,
	dont_etudiants integer,
	conditions_subvention_participants_etudiants text
);

create table conferenciers
(
	id_manif integer references manifestation,
	nb_conferenciers integer,
	dont_Paris13 integer,
	dont_France integer,
	dont_etrangers integer,
	conditions_invitation text
);

create table Montant_droit_inscription_participants
(
	id_manif integer references manifestation,
	etablissement_publics text,
	etudiants text,
	etablissement_prives text,
	plein_tarif text
);

create table depenses_prevues
(
	id_manif integer references manifestation,
	publicite_courrier_tel text,
	fournitures text,
	location_salle_conference text,
	repas text,
	salaire_secretariat text,
	frais_de_sejour text,
	frais_de_transport text,
	subvention_participation text,
	indemnites_conferenciers text,
	montage_stands text,
	gestion_dossiers text,
	traduction_simultanee text,
	autres text,
	total text
);

create table montant_subvention_sollicitees
(
	id_manif integer references manifestation,
	ministere_enseignement_sup_recherche text,
	ministere_affaires_etrangeres text,
	autres_ministeres text,
	union_europeenne text,
	municipalite text,
	conseil_regional text,
	conseil_general text,
	CNRS text,
	INSERM text,
	autres_EPST_ou_EPIC text,
	organismes_prives text,
	autres_organismes text,
	subvention_demande_a_Univ_Paris13 text
);



/*CREATE TABLE subvention_actes 
(
	demandeur_nom varchar(32),
	demandeur_prenom varchar(32),
	date varchar(32) PRIMARY KEY
);*/

