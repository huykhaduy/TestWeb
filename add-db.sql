

START TRANSACTION;

CREATE TABLE FORM(
    formId varchar(256) NOT NULL PRIMARY KEY,
    form_description varchar(256), 
    form_tilte varchar(256),
    form_documentitle varchar(256)
);


CREATE TABLE QUESTION(
    questionId varchar(100) NOT NULL PRIMARY KEY,
    title MEDIUMTEXT,
    question_description TEXT,
    image_url varchar(512),
    point_value int not null DEFAULT 1,
    shuffle boolean not null DEFAULT false,
);

CREATE TABLE CHOICE(
    choiceId varchar(128) not null PRIMARY key,
    image_url varchar(512), 
    value text,
    isTrue boolean not null DEFAULT false,
);

CREATE TABLE FORM_USER_STATUS(
    userId int(12) not null,
    formId varchar(256) not null,
    isDone boolean not null default false,
    from_hash varchar(128),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
);

COMMIT;


