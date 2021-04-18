create or replace function modifJeu(integer, text, text, text, integer, real) 
returns integer
    
as 
'
	declare 
	  f_id_jeu alias for $1;
	  f_nom_jeu alias for $2;
	  f_plateforme alias for $3;
	  f_editeur alias for $4;
	  f_anneesortie alias for $5;
	  f_note alias for $6;
	  id integer;
	  
	begin
	  select into id idJeu from jv_jeux where nomJeu = f_nom_jeu;
	  if not found
	  then
		return 0;
	  else
		update jv_jeux set nomJeu=f_nom_jeu, plateforme=f_plateforme, editeur=f_editeur, anneesortie=f_anneesortie, note=f_note where idJeu=id;
		return 1;
	  end if;
	end;
'
language plpgsql;