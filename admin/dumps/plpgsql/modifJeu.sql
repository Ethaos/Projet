create or replace function modifJeu(integer, text, text) 
returns integer
    
as 
'
	declare 
	  f_id_jeu alias for $1;
	  f_champ alias for $2;
	  f_valeur alias for $3;
	  id integer;
	  
	begin
	  select into id idJeu from jv_jeux where idJeu=f_id_jeu;
	  if not found
	  then
		return 0;
	  else
		update jv_jeux set f_champ = f_valeur  where idJeu = f_id_jeu;
		return 1;
	  end if;
	end;
'
language plpgsql;