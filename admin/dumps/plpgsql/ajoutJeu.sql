create or replace function ajoutJeu(text,text,text,integer,real) returns integer
as
'
    declare f_nom_jeu alias for $1;
	declare f_plateforme alias for $2;
	declare f_editeur alias for $3;
	declare f_annee alias for $4;
	declare f_note alias for $5;
	declare retour integer;
	declare id integer;
begin
    select into id idJeu from jv_jeux where nomJeu = f_nom_jeu;
		if not found 
		then
			insert into jv_jeux (nomJeu,plateforme,editeur,anneesortie,note) values (f_nom_jeu,f_plateforme,f_editeur,f_annee,f_note);
			retour = 1;
		else
			retour = 0;
		end if;
    return retour;
end;
'
language plpgsql;