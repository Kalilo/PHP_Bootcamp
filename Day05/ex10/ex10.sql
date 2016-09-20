SELECT title as Title, summary as Summary, prod_year
FROM film
INNER JOIN genre on genre.id_genre=film.id_genre
AND genre.name = 'erotic'
ORDER BY prod_year DESC;
