SELECT Ucase(subscription.name) as NAME, user_card.first_name, subscription.price
FROM subscription
INNER JOIN user_card, member
WHERE member.id_sub = subscription.id_sub AND subscription.price > 42
ORDER BY subscription.name ASC, user_card.first_name ASC;