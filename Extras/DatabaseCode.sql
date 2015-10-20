create table if not exists profiles(

idProfile INT unsigned not null auto_increment,
profName VARCHAR(50) character set utf8 collate utf8_spanish_ci,
primary key(idProfile)

)engine=myisam character set utf8 collate utf8_spanish_ci;

create table if not exists matrix(
id_matrix INT unsigned not null auto_increment,
valores BLOB,
primary key(id_matrix)
)engine=InnoDB default character set=utf8;

create table if not exists users(

idUser INT unsigned not null auto_increment,
logUser VARCHAR(25) character set utf8 collate utf8_spanish_ci,
pasUser VARCHAR(25) character set utf8 collate utf8_spanish_ci,
idProf INT not null,
id_matrix INT not null,
primary key(idUser),
constraint fk1 foreign key(idProf) references profiles(idProfile),
constraint fk2 foreign key(id_matrix) references matrix(id_matrix)

)engine=myisam character set utf8 collate utf8_spanish_ci;

create table if not exists books(

idBook INT unsigned not null auto_increment,
codeBo varchar(50) character set utf8 collate utf8_spanish_ci,
titleB VARCHAR(100) character set utf8 collate utf8_spanish_ci,
autorB VARCHAR(250) character set utf8 collate utf8_spanish_ci,
descrB LONGTEXT character set utf8 collate utf8_spanish_ci,
editoB VARCHAR(100) character set utf8 collate utf8_spanish_ci,
dateBo INT,
primary key(idBook)

)engine=myisam character set utf8 collate utf8_spanish_ci;