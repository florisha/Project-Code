#!/bin/bash
# importing json file in mongodb and making collection articles

if [ $# -ne 3 ]
then
    printf "\nUsage: \n\$ $0 <collection> <database> <user>  \n\n"
    exit 1
fi

printf "\nMongodb password: "
#read -s pass

coll="$1"
db="$2"
user="$3"

mysql -u "$db" -p"azeti6ex" -e "source new.sql;"
 
$(sed -n 49,148p existing_tables.sql > text.csv)
$(sed -i 's/(//g' text.csv)
$(sed -i 's/)//g' text.csv)
$(sed -i 's/"//g' text.csv)

mongoimport -u "$db" -p "azeti6ex" -d "$db" -c "Author" --drop --type csv --fields "fname,lname,email" --file "text.csv"
# mongoimport -d "$db" -c "Author " --drop --type csv --fields "fname,lname,email" --file "text.csv"
#$(rm text.csv)
mongoimport -u "$db" -p "azeti6ex" -d "$db"  -c "$coll" --drop --file "articles.json"
python "data2mongo.py"
