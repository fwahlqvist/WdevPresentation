CREATE TABLE presentation (
  id int(11) NOT NULL auto_increment,
  title varchar(100) NOT NULL,
  content varchar(25500) NOT NULL,
  PRIMARY KEY (id)
);
INSERT INTO presentation (title, content)
    VALUES  ('Demonstration',  'To be updated');