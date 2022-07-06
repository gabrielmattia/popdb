-- CREATE TABLE categories(
--     id_categories BIGSERIAL PRIMARY KEY,
--     name VARCHAR(20) NOT NULL
-- );


-- CREATE TABLE organizations(
-- cnpj VARCHAR(50) NOT NULL UNIQUE PRIMARY KEY,
-- name VARCHAR(50) NOT NULL,
-- zip_code VARCHAR(10) NOT NULL,
-- street VARCHAR(50) NOT NULL,
-- number int NOT NULL,
-- neighborhood VARCHAR(50) NOT NULL,
-- state VARCHAR(50) NOT NULL,
-- city VARCHAR(50) NOT NULL,
-- country VARCHAR(50) NOT NULL,
-- site VARCHAR(50),
-- category BIGSERIAL NOT NULL,
-- CONSTRAINT fk_categories FOREIGN KEY (category) REFERENCES categories (id_categories)

-- ); 


-- chave estrangeira
CREATE TABLE alliances  (
 id_alliances BIGSERIAL NOT NULL PRIMARY KEY,
 name VARCHAR(50) NOT NULL,
 creation_date DATE NOT NULL,
 goal VARCHAR(100) , 
 responsable_organization VARCHAR(50) NOT NULL,
 CONSTRAINT fk_responsable_oraganization FOREIGN KEY (responsable_organization) REFERENCES organizations (cnpj)
--  alliance_members BIGSERIAL 
 );

-- create type relationship_type as enum('Merge', 'Partnership', 'Acquisition');

-- chave estrangeira
CREATE TABLE members(
    id_members BIGSERIAL PRIMARY KEY,
    organization VARCHAR(50), 
    CONSTRAINT fk_organization FOREIGN KEY (organization) REFERENCES organizations(cnpj), 
    relationship relationship_type NOT NULL,
    entry_date DATE NOT NULL,
    exit_date DATE,
    -- alliance chave estrangeira da alliance  
    alliance BIGSERIAL REFERENCES alliances(id_alliances)
);

ALTER TABLE alliances
ADD alliance_members INT DEFAULT NULL ;

ALTER TABLE alliances
ADD CONSTRAINT fk_membersAlliances FOREIGN KEY (alliance_members) REFERENCES members (id_members);

