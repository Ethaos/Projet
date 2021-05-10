create or replace function modifMail(integer,text) 
returns integer
    
as 
'
	declare 
	  f_id_user alias for $1;
	  f_mail alias for $2;
	  id integer;
	  
	begin
	  select into id idUser from jv_user where idUser = f_id_user;
	  if not found
	  then
		return 0;
	  else
		update jv_user set mail = f_mail where idUser=id;
		return 1;
	  end if;
	end;
'
language plpgsql;