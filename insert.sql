insert into categories (name) values ('Vendas');
insert into categories (name) values ('Agricultura');
insert into categories (name) values ('Pesquisa');
insert into categories (name) values ('Cultura');
insert into categories (name) values ('Viagens');
insert into categories (name) values ('Saúde');
insert into categories (name) values ('Educação');
insert into categories (name) values ('Assistência Social');
insert into categories (name) values ('Comunicações');
insert into categories (name) values ('Finanças');
insert into categories (name) values ('Meio Ambiente');
insert into categories (name) values ('Infraestrutura');


insert into organizations (cnpj, name, zip_code, street, number, neighborhood, city, state, country, site, category) values ('8325185112', 'Meeveo', '66302-300', 'Hintze', '45695', 'Avenue', 'Philadelphia', 'Pennsylvania', 'United States', 'army.mil', 1);
insert into organizations (cnpj, name, zip_code, street, number, neighborhood, city, state, country, site, category) values ('2583227866', 'Devshare', '68258-5980', 'Burning Wood', '6584', 'Avenue', 'Beaumont', 'Texas', 'United States', 'who.int', 6);
insert into organizations (cnpj, name, zip_code, street, number, neighborhood, city, state, country, site, category) values ('1155095820', 'Ooba', '46122-266', 'Victoria', '69', 'Parkway', 'Hot Springs National Park', 'Arkansas', 'United States', 'census.gov', 3);


-- insert into members (organization,relationship,entry_date,alliance) values ('2583227866','Merge',DATE '2020/01/01','1');
-- insert into members (organization,relationship,entry_date,alliance) values ('1155095820','Acquisition',DATE '2020/06/01','1');
-- insert into members (organization,relationship,entry_date,alliance) values ('1155095820','Merge',DATE '2020/06/01','1');

-- insert into members (organization,relationship,entry_date,alliance) values ('2583227866','Partnership',DATE '2020/06/01','2');

-- insert into alliances (name,creation_date,goal,responsable_organization) values ('nova alianca',DATE '2020/11/29','goal goal','8325185112');
-- insert into alliances (name,creation_date,goal,responsable_organization) values ('Crawford',DATE '2020/10/28','goal goal','1155095820');



-- SELECT alliances.members
-- FROM alliances
-- INNER JOIN alliances ON members.id_members=4;

-- SELECT members.organization
-- FROM members
-- INNER JOIN alliances.responsable_oraganization;