/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  26/02/2016 10:00:02                      */
/*==============================================================*/


drop table if exists ACHETER;

drop table if exists APPARTENIR;

drop table if exists CATEGORIE;

drop table if exists EVENEMENT;

drop table if exists GERER;

drop table if exists PARTICIPER_A;

drop table if exists POSSEDER;

drop table if exists PRODUIT;

drop table if exists PROPOSER;

drop table if exists TARIF;

drop table if exists UTILISATEUR;

/*==============================================================*/
/* Table : ACHETER                                              */
/*==============================================================*/
create table ACHETER
(
   ID_PRODUIT           int not null,
   MAIL                 varchar(30) not null,
   MODE_PAIEMENT        varchar(10),
   QUANTITE_ACHETEE     int,
   DATE_ACHAT           date,
  