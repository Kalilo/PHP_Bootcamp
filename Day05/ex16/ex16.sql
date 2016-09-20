SELECT count(film.id_film) as movies
FROM film
WHERE film.last_projection >= 2006-10-30 AND film.release_date <= 2007-07-27 
UNION
SELECT count(member_history.id_member) as movies
FROM member_history
WHERE date(member_history.date) like "%-12-24"