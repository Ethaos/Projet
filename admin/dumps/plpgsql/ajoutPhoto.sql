create or replace function ajoutPhoto(integer, text) 
returns integer
    
as 
'
	declare 
	  f_id_jeu alias for $1;
	  f_photo alias for $2;
	  id integer;
	  
	begin
	  select into id idJeu from jv_jeux where idJeu = f_id_jeu;
	  if not found
	  then
		return 0;
	  else
		update jv_jeux set photo=f_photo where idJeu=f_id_jeu;
		return 1;
	  end if;
	end;
'
language plpgsql;