-- Adminer 4.3.1 PostgreSQL dump

DROP TABLE IF EXISTS "migrations";
CREATE SEQUENCE migrations_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE "public"."migrations" (
    "id" integer DEFAULT nextval('migrations_id_seq') NOT NULL,
    "migration" character varying(255) NOT NULL,
    "batch" integer NOT NULL,
    CONSTRAINT "migrations_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "migrations" ("id", "migration", "batch") VALUES
(1,	'2018_02_21_090508_create_users_table',	1),
(2,	'2018_02_21_131659_create_users_token_table',	1),
(3,	'2018_05_08_135444_create_events_table',	1),
(4,	'2018_11_24_162854_create_appfiles_table',	1);

DROP TABLE IF EXISTS "users";
CREATE SEQUENCE users_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE "public"."users" (
    "id" integer DEFAULT nextval('users_id_seq') NOT NULL,
    "email" character varying(51) NOT NULL,
    "name" text NOT NULL,
    "address" text NOT NULL,
    "dob" date NOT NULL,
    "password" character varying(32) NOT NULL,
    "created_at" timestamp(0),
    "updated_at" timestamp(0),
    CONSTRAINT "users_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "users" ("id", "email", "name", "address", "dob", "password", "created_at", "updated_at") VALUES
(9,	'romen@romen.com',	'Romen',	'India',	'2019-03-01',	'pCFqtNSPSiDhG4V',	'2019-03-01 10:45:19',	'2019-03-01 10:45:19'),
(76,	'xyz@xyz.com',	'xyzs',	'India',	'2019-05-29',	'e10adc3949ba59abbe56e057f20f883e',	'2019-05-29 05:09:51',	'2019-05-29 05:09:51');

DROP TABLE IF EXISTS "users_token";
CREATE SEQUENCE users_token_token_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE "public"."users_token" (
    "token_id" integer DEFAULT nextval('users_token_token_id_seq') NOT NULL,
    "user_id" integer NOT NULL,
    "api_token" text NOT NULL,
    "social_media_type" text NOT NULL,
    "created_at" timestamp(0),
    "updated_at" timestamp(0),
    CONSTRAINT "users_token_pkey" PRIMARY KEY ("token_id"),
    CONSTRAINT "users_token_user_id_foreign" FOREIGN KEY (user_id) REFERENCES users(id) NOT DEFERRABLE
) WITH (oids = false);

CREATE INDEX "users_token_user_id_index" ON "public"."users_token" USING btree ("user_id");

INSERT INTO "users_token" ("token_id", "user_id", "api_token", "social_media_type", "created_at", "updated_at") VALUES
(94,	12,	'dTFZdGM3cDNWZVBITEUwVnZRRWpydGFuNTJLOEg1UFNFR0F4UzRYQQ==',	'login',	'2019-08-08 09:54:23',	'2019-08-08 09:54:23'),
(95,	12,	'Y0VCT1BuSTVGeEdJYWlsMnZqS2l1dTNnV0ZqRnhUck1zMHFQN1U0Tw==',	'login',	'2019-08-08 09:59:23',	'2019-08-08 09:59:23'),
(96,	12,	'ZUhoQ0FqOVk3RFlnd3Jpc1ZuODM5UWZGU1JxRkZUM08yNDVDRGxpQw==',	'login',	'2019-08-08 10:00:02',	'2019-08-08 10:00:02'),
(97,	12,	'UTNMUldMUnVaUzZhMzR5cXJGVWh6aXRRYUFyT0JiS09ZdzhVNHVGUQ==',	'login',	'2019-08-08 10:01:47',	'2019-08-08 10:01:47'),
(98,	12,	'c1h1YWNoS0NrN1hJbXBFSHpEdHgxUUJDaEltUE43dUFoWjFMMUJ4WA==',	'login',	'2019-08-08 10:13:47',	'2019-08-08 10:13:47');

DROP TABLE IF EXISTS "events";
CREATE SEQUENCE events_event_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE "public"."events" (
    "event_id" integer DEFAULT nextval('events_event_id_seq') NOT NULL,
    "user_id" integer NOT NULL,
    "event_title" text NOT NULL,
    "event_description" text NOT NULL,
    "event_location" text NOT NULL,
    "event_address" text NOT NULL,
    "event_city" text NOT NULL,
    "event_state" text NOT NULL,
    "event_country" text NOT NULL,
    "event_banner" text NOT NULL,
    "created_at" timestamp(0),
    "updated_at" timestamp(0),
    CONSTRAINT "events_pkey" PRIMARY KEY ("event_id")
) WITH (oids = false);


DROP TABLE IF EXISTS "appfiles";
CREATE SEQUENCE appfiles_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE "public"."appfiles" (
    "id" integer DEFAULT nextval('appfiles_id_seq') NOT NULL,
    "user_id" integer,
    "realfile_name" text,
    "file_name" text,
    "created_at" timestamp(0),
    "updated_at" timestamp(0),
    CONSTRAINT "appfiles_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "appfiles" ("id", "user_id", "realfile_name", "file_name", "created_at", "updated_at") VALUES
(1,	NULL,	'67_145_487283003.jpg',	'5c685deae3068_.jpg',	'2019-02-16 19:00:58',	'2019-02-16 19:00:58'),
(2,	NULL,	'delorean-starts-in-neon-colored-80s-style-mood-film-video-92108_1.jpg',	'5c751f8ae3cc0_.jpg',	'2019-02-26 11:14:19',	'2019-02-26 11:14:19'),
(3,	NULL,	'569_2561_566966003.jpg',	'5c75239c7e692_.jpg',	'2019-02-26 11:31:40',	'2019-02-26 11:31:40'),
(4,	NULL,	'rolls_royce_phantom_2018_4k-wide.jpg',	'5c75327dd7f00_.jpg',	'2019-02-26 12:35:09',	'2019-02-26 12:35:09'),
(5,	NULL,	'blob',	'5d52682eab84a_.',	'2019-08-13 07:35:10',	'2019-08-13 07:35:10');

-- 2019-09-18 14:05:18.064928+05:30
