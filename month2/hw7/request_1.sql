select f.title, f.duration, f.amount, sum(t.payment) as profit, count(t.id)
from seances
         inner join film_seance fs on seances.id = fs.seance_id
         inner join films f on f.id = fs.film_id
         inner join transaction_seance ts on seances.id = ts.seance_id
         inner join transactions t on t.id = ts.transaction_id
GROUP BY f.title, f.duration, f.amount
ORDER BY profit desc
limit 1