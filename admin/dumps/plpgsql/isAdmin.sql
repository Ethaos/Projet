create or replace function isAdmin(text,text,boolean) returns integer
as
'
    declare f_mail alias for $1;
	declare f_password alias for $2;
    declare f_status alias for $3; 
	declare id integer;
	declare retour integer;
begin
    select into id idUser from jvUser where mailUser = f_mail and password = f_password and status = f_status;
	if not found 
	then retour = 0;
	else
	retour = 1;
	end if;
    return retour;
end;
'
language plpgsql;