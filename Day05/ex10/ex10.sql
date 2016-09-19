SELECT title, summary, prod_year FROM film INNER JOIN genre on genre.id_genre=film.id_genre AND name = 'erotic' ORDER BY prod_year DESC;
