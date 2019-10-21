/* inserir new campo user*/	
ALTER TABLE user ADD verificador varchar(50) collate utf8_general_ci AFTER situacao;


/* inserir new campo users*/	
ALTER TABLE users ADD verificador varchar(50) collate utf8_general_ci AFTER situacao;