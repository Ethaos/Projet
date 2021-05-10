create or replace function inscription(text,text,text,text) returns integer
as
'
    declare f_nom alias for $1;
	declare f_prenom alias for $2;
	declare f_mail alias for $3;
	declare f_password alias for $4;
	declare retour integer;
	declare id integer;
begin
    select into id iduser from jv_user where mail = f_mail;
		if not found 
		then
			insert into jv_user (nom,prenom,mail,password,status) values (f_nom,f_prenom,f_mail,md5(f_password),false);
			retour = 1;
		else
			retour = 0;
		end if;
    return retour;
end;
'
language plpgsql;