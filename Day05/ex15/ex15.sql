SELECT REVERSE(SUBSTRING(phone_number FROM 2)) as rebmunenohp
FROM distrib
WHERE phone_number LIKE "05%";