create table utente(
    email varchar (50) not null,
    pass varchar (16) not null,
    nome varchar (50) not null,
    cognome varchar (50) not null,
    indirizzo varchar (100) not null,
    civico varchar (10) not null,
    cap varchar (5) not null,
    primary key (email)
);