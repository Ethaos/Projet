create or replace function upgradeClient(integer)
returns integer
    
as 
'
	declare 
	  f_id_user alias for $1;
	  id integer;
	  
	begin
	  select into id iduser from jv_user where iduser = f_id_user;
	  if not found
	  then
		return 0;
	  else
		update jv_user set status=true where iduser=f_id_user;
		return 1;
	  end if;
	end;
'
language plpgsql;