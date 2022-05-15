-- Table: public.prodotto

-- DROP TABLE IF EXISTS public.prodotto;

CREATE TABLE IF NOT EXISTS public.prodotto
(
    idprodotto numeric(6,0) NOT NULL,
    immagine bytea NOT NULL,
    nome text COLLATE pg_catalog."default" NOT NULL,
    quantita integer NOT NULL,
    prezzo money NOT NULL,
    tags text COLLATE pg_catalog."default" NOT NULL,
    idutente numeric(6,0),
    CONSTRAINT prodotto_pkey PRIMARY KEY (idprodotto)
)
TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.prodotto
    OWNER to postgres;