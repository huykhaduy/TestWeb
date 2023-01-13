START TRANSACTION;

CREATE TABLE form(
    formId varchar(256) NOT NULL PRIMARY KEY,
    form_description varchar(256), 
    form_tilte varchar(256),
    form_documentitle varchar(256)
);

CREATE TABLE question(
    questionId varchar(100) NOT NULL PRIMARY KEY,
    title MEDIUMTEXT,
    question_description TEXT,
    image_url varchar(512),
    point_value int not null DEFAULT 1,
    shuffle boolean not null DEFAULT false,
    formId varchar(256)
);

CREATE TABLE choice(
    choiceId varchar(128) not null PRIMARY key,
    image_url varchar(512), 
    choice_value text,
    isTrue boolean not null DEFAULT false,
    questionId varchar(100)
);

CREATE TABLE form_user_status(
    userId int(12) not null,
    formId varchar(256) not null,
    isDone boolean not null default false,
    from_hash varchar(128),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    total_point int not null default 1
);

ALTER TABLE question ADD FOREIGN KEY (formId) REFERENCES form(formId);
ALTER TABLE choice ADD FOREIGN KEY (questionid) REFERENCES question(questionId);
ALTER TABLE form_user_status ADD CONSTRAINT PRIMARY KEY(userId, formId);
ALTER TABLE form_user_status ADD FOREIGN KEY (userId) REFERENCES users(id);
ALTER TABLE form_user_status ADD FOREIGN KEY (formId) REFERENCES form(formId);

COMMIT;


