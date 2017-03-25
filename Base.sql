
create TABLE membre
(
	id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	login varchar(32),
	pass text
);

create table client
(
	id INTEGER primary key references membre,
	nom varchar(32),
	prenom varchar(32),
	qualite varchar(32),
	composante varchar(32),
	laboratoire varchar(32),
	tel integer,
	mail varchar(32)
	
);

insert into membre (login,pass) values('Assan','5c3dfbf6fb4939d85a76eaff59b057f7f01b0b0b');
insert into membre (login,pass) values('Mehdi','5c3dfbf6fb4939d85a76eaff59b057f7f01b0b0b');

create table publication
(
	id_publication integer unsigned not null AUTO_INCREMENT primary key,
	id integer references client,
	type_publication text,
	nom_publication text,
	titre_ouvrage text,
	date_prevue date,
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

create table coordinateur
(
	id_co INTEGER unsigned not null AUTO_INCREMENT primary key,
	nom_co varchar(32),
	prenom_co varchar(32),
	qualite_co varchar(32),
	composante_co varchar(32),
	laboratoire_co varchar(32),
	tel_co integer,
	mail_co varchar(32),
	nom_publication_co text references publication
);

create table financement
(
	id_financement integer primary key,
	id_publication integer references publication,
	montant float,
	montant_editeur float,
	subvention_demandé_au_CS integer,
	co_financement text,
	virement_laboratoire text,
	gestion_financiere_bred text
);

create table manifestation
(
	id_manif integer primary key,
	id integer references client,
	nom_manif text,
	type_manif text,
	date_manif date,
	lieu text,
	caractere varchar(32),
	site_web text
);

create table organisateur
(
	id_manif integer references manifestation,
	nom_manif text references manifestation,
	responsables varchar(32),
	addresse text,
	tel integer,
	mail text,
	co_responsable varchar(32),
	adrresse_co_responsable text,
	tel_co_responsable integer,
	mail_co_responsable text,
	conditions_organisation text
);

create table participants
(
	id_manif integer references manifestation,
	nom_manif text references manifestation,
	nb_participants integer,
	dont_payants integer,
	dont_non_payants integer,
	dont_etudiants integer,
	conditions_subvention_participants_etudiants text
);

create table conferenciers
(
	id_manif integer references manifestation,
	nom_manif text references manifestation,
	nb_conferenciers integer,
	dont_Paris13 integer,
	dont_France integer,
	dont_etrangers integer,
	conditions_invitation text
);

create table Montant_droit_inscription_participants
(
	id_manif integer references manifestation,
	nom_manif text references manifestation,
	etablissement_publics float,
	etudiants float,
	etablissement_privés float,
	plein_tarif float
);

create table depenses_prevues
(
	id_manif integer references manifestation,
	nom_manif text references manifestation,
	publicite_courrier_tel float,
	fournitures float,
	location_salle_conference float,
	repas float,
	salaire_secretariat float,
	frais_de_sejour float,
	frais_de_transport float,
	subvention_participation float,
	indemnites_conferenciers float,
	montage_stands float,
	gestion_dossiers float,
	traduction_simultanee float,
	autres float,
	total float
);

create table montant_subvention_sollicitees
(
	id_manif integer references manifestation,
	nom_manif text references manifestation,
	ministere_enseignement_sup_recherche float,
	ministere_affaires_etrangeres float,
	autres_ministeres float,
	union_europeenne float,
	municipalite float,
	conseil_regional float,
	conseil_general float,
	CNRS float,
	INSERM float,
	autres_EPST_ou_EPIC float,
	organismes_prives float,
	autres_organismes float,
	subvention_demandé_a_Univ_Paris13 float
);



/*CREATE TABLE subvention_actes 
(
	demandeur_nom varchar(32),
	demandeur_prenom varchar(32),
	date varchar(32) PRIMARY KEY
);*/

