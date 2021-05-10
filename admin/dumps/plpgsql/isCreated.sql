create or replace function isCreated(text,text) returns integer
as
'
    declare f_mail alias for $1;
	declare f_password alias for $2;
	declare id integer;
	declare retour integer;
begin
    	select into id iduser from jv_user where mail = f_mail and password = f_password and status = true;
	if not found 
	then 
		select into id iduser from jv_user where mail = f_mail and password = f_password and status = false;
		if not found 
		then 
			retour = 0;
		else 
			retour = 2;
		end if;
	else
	retour = 1;
	end if;
    return retour;
end;
'
language plpgsql;