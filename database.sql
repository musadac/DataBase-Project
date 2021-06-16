
DROP TABLE log;
DROP TABLE exercise;
DROP TABLE equipment;
DROP TABLE workout_plan;
DROP TABLE member;

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
weight number NOT NULL,
CONSTRAINT PKlog PRIMARY KEY (today),
CONSTRAINT FKlog FOREIGN KEY (userid) REFERENCES member (userid));



CREATE OR REPLACE PROCEDURE workout(userids varchar2, todays varchar2,
 carbohydrate_intakes varchar2,fat_intakes varchar2,
  protein_intakes varchar2, weights number) IS
   the_height NUMBER;
   cal_BMI NUMBER;
BEGIN
       SELECT height INTO the_height FROM member where userid = userids;
       cal_BMI := weights/(the_height/39.37);
       UPDATE member
       SET BMI =cal_BMI,weight = weights
       where userid =userids;
      insert into log
        values(userids,todays,carbohydrate_intakes,fat_intakes,
        protein_intakes,weights);

END;
/
INSERT INTO equipment VALUES ('Dumbell',0);
INSERT INTO equipment VALUES ('Treadmill',1);
INSERT INTO equipment VALUES ('Cycle',2);
INSERT INTO equipment VALUES ('Pullups',3);
INSERT INTO member VALUES ('admin','male', 'admin@fitme.com', '1/1/1', '0', '0', '1','null', 5 ,'1234');
INSERT INTO workout_plan VALUES ('admin',0, '2', '2', '2','Weekly');
INSERT INTO exercise VALUES (0,'Hallo', 0, 'Abs', 50);



COMMIT;