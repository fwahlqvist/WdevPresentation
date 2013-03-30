CREATE TABLE presentation (
  id int(11) NOT NULL auto_increment,
  title varchar(100) NOT NULL,
  content varchar(10000) NOT NULL,
  PRIMARY KEY (id)
);
INSERT INTO presentation (title, content)
    VALUES  ('Demonstration',  'To be updated');