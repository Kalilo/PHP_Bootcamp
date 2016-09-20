SELECT film.id_genre, genre.name, film.id_distrib, distrib.name, film.title 
FROM film 
LEFT JOIN genre 
ON film.id_genre=genre.id_genre 
LEFT JOIN distrib 
ON film.id_distrib=distrib.id_distrib
WHERE film.id_genre > 3 AND film.id_genre < 9;