SELECT title, summary
FROM film
WHERE lower(summary) like '%vincent%'
ORDER BY id_film ASC;
