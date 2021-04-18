create or replace function supprJeu(integer) 
returns integer
    
as 
'
	declare 
	  f_id_jeu alias for $1;
	  id integer;
	  
	begin
	  select into id idJeu from jv_jeux where idJeu=f_id_jeu;
	  if not found
	  then
		return 0;
	  else
		delete from jv_jeux where idJeu = f_id_jeu;
		return 1;
	  end if;
	end;
'
language plpgsql;