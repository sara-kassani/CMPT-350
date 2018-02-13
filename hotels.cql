CREATE KEYSPACE keyhotels
    WITH replication = {'class': 'SimpleStrategy', 'replication_factor' : 3};

USE keyhotels;


CREATE TABLE tblhotel (
    name text,
    address text,
    postcode text,
    telephone text,
    information text,
    location text,
    PRIMARY KEY ((name, postcode)));



COPY tblhotel(name,address,postcode,telephone,information,location) FROM 'Hotels.csv' WITH HEADER = TRUE ;
