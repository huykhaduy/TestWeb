START TRANSACTION;

-- CREATE TABLE form(
--     formId varchar(256) NOT NULL PRIMARY KEY,
--     form_description varchar(256), 
--     form_tilte varchar(256),
--     form_documentitle varchar(256),
--     cate_id int
-- );

CREATE TABLE question(
    questionId varchar(100) NOT NULL PRIMARY KEY,
    title MEDIUMTEXT,
    question_description TEXT,
    image_url varchar(512) not null default "",
    point_value int not null DEFAULT 1,
    shuffle boolean not null DEFAULT false,
    question_type varchar(64),
    chapterId int,
    question_level int not null default 0
);

CREATE TABLE choice(
    choiceId int NOT NULL AUTO_INCREMENT PRIMARY key,
    image_url varchar(512) not null default "", 
    choice_value text,
    isTrue boolean not null DEFAULT false,
    questionId varchar(100)
);

CREATE TABLE chapter_user_status(
    userId int(12) not null,
    chapterId int not null,
    isDone boolean not null default false,
    from_hash varchar(128),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    total_point int not null default 1
);

ALTER TABLE question ADD FOREIGN KEY (chapterId) REFERENCES chapter(id);
ALTER TABLE choice ADD FOREIGN KEY (questionid) REFERENCES question(questionId);
ALTER TABLE chapter_user_status ADD CONSTRAINT PRIMARY KEY(userId, chapterId);
ALTER TABLE chapter_user_status ADD FOREIGN KEY (userId) REFERENCES users(id);
ALTER TABLE chapter_user_status ADD FOREIGN KEY (chapterId) REFERENCES chapter(id);
-- ALTER TABLE form ADD FOREIGN KEY (cate_id) REFERENCES cate(id);

COMMIT;


