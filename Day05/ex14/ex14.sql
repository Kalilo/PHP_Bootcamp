SELECT floor_number as floor, sum(nb_seats) as seats
FROM cinema 
GROUP BY floor_number
ORDER BY floor_number DESC;
