INSERT INTO ft_table (creation_date, login, `group`)
SELECT birthdate, first_name, "other"
FROM user_card
WHERE CHAR_LENGTH(first_name) < 9
AND first_name LIKE '%a%'
ORDER BY first_name ASC LIMIT 10;
