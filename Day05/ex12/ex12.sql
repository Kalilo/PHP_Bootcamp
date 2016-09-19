SELECT last_name as name, first_name FROM user_card WHERE (last_name like "%-%" OR first_name like "%-%") ORDER BY first_name ASC;
