SELECT concat(first_name, concat(first_name, date(birthdate))) as birthdate FROM user_card WHERE birthdate LIKE "1989%" ORDER BY first_name ASC;
