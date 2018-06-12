$(mysql -u "u24" -p"azeti6ex" -e "use u24;
set FOREIGN_KEY_CHECKS=0;
truncate table AUTHOR;
truncate table articles;
truncate table article_author;
truncate table CUSTOMER;
truncate table ITEM;
truncate table TRANS;
truncate table TD;
truncate table MAGAZINE;
truncate table volume;
truncate table contain;
#set FOREIGN_KEY_CHECKS=1;

LOAD DATA LOCAL INFILE '/home/course/cda540/u24/dbproject/authors.csv' INTO TABLE AUTHOR FIELDS TERMINATED BY ',' IGNORE 1 LINES;

LOAD DATA LOCAL INFILE '/home/course/cda540/u24/dbproject/articles.csv' INTO TABLE articles FIELDS TERMINATED BY ',' IGNORE 1 LINES;

LOAD DATA LOCAL INFILE '/home/course/cda540/u24/dbproject/art_auth.csv' INTO TABLE article_author FIELDS TERMINATED BY ',' IGNORE 1 LINES;

LOAD DATA LOCAL INFILE '/home/course/cda540/u24/dbproject/magazines.csv' INTO TABLE MAGAZINE FIELDS TERMINATED BY ',' IGNORE 1 LINES;


LOAD DATA LOCAL INFILE '/home/course/cda540/u24/dbproject/volumes.csv' INTO TABLE volume FIELDS TERMINATED BY ',' IGNORE 1 LINES;

LOAD DATA LOCAL INFILE '/home/course/cda540/u24/dbproject/contains.csv' INTO TABLE contain FIELDS TERMINATED BY ',' IGNORE 1 LINES;

set FOREIGN_KEY_CHECKS=1;


")
