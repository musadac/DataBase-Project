CREATE TABLE member( userid varchar2(20) NOT NULL,
gender varchar2(14), 
email varchar2(40), 
bdate varchar(10) NOT NULL, 
weight number NOT NULL, 
height number NOT NULL, 
active_plan varchar2(14),
musclesize varchar2(14), 
BMI number ,
password varchar2(40), 
CONSTRAINT PKmember PRIMARY KEY (userid));



CREATE TABLE workout_plan( userid varchar2(20) NOT NULL,
dno number NOT NULL primary key,
protein varchar2(14),
fats varchar2(14),
carbohydrates varchar2(14),
type varchar2(14),
CONSTRAINT FKworkoutplan1 FOREIGN KEY (userid) REFERENCES member(userid) ,
CONSTRAINT FKworkoutplan2 FOREIGN KEY (dno) REFERENCES workout_plan (dno));




CREATE TABLE equipment( name varchar(14) NOT NULL,
model number NOT NULL,
CONSTRAINT PKequipment PRIMARY KEY (model));



CREATE TABLE exercise( dno number NOT NULL primary key ,
ex_name varchar2(14) NOT NULL,
model number NOT NULL,
target_muscle varchar2(14) NOT NULL,
duration int NOT NULL,
CONSTRAINT FKexercise1 FOREIGN KEY (dno) REFERENCES workout_plan(dno),
CONSTRAINT FKexercise FOREIGN KEY (model) REFERENCES equipment (model));



CREATE TABLE log( userid varchar2(20) NOT NULL,
today varchar2(16) NOT NULL,
carbohydrate_intake varchar2(14) NOT NULL,
fat_intake varchar2(14) NOT NULL,
protein_intake varchar2(14) NOT NULL,
weight int NOT NULL,
CONSTRAINT PKlog PRIMARY KEY (today),
CONSTRAINT FKlog FOREIGN KEY (userid) REFERENCES member (userid));






CREATE SEQUENCE workout_sequence;

insert into workout_plan(dno,userid,protein,fats,carbohydrates)
values(2,'musadac1','2','2','2');


CREATE OR REPLACE TRIGGER workout_on_insert
  BEFORE INSERT ON workout_plan
  FOR EACH ROW
BEGIN
  SELECT workout_sequence.nextval
  INTO :new.dno
  FROM dual;
END;
/