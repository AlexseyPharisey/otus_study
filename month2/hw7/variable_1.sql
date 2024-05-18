create table cinemas
(
    id serial primary key,
    name varchar(255) NOT NULL
);

create table halls
(
    id serial primary key,
    number INT NOT NULL
);

create table seances
(
    id serial primary key,
    start_at timestamp NOT NULL,
    end_at timestamp NOT NULL
);

create table films
(
    id serial primary key,
    title varchar(255) NOT NULL,
    description text,
    release_year INT,
    duration INT,
    is_over bool DEFAULT false,
    amount INT NOT NULL
);

create table transactions
(
    id serial primary key,
    mail varchar(255) NOT NULL,
    number INT NOT NULL,
    payment INT NOT NULL
);

create table hall_cinema
(
    hall_id INT references halls,
    cinema_id INT references cinemas,
    primary key (hall_id, cinema_id)
);

create table seance_hall
(
    seance_id INT references seances,
    hall_id INT references halls,
    primary key (seance_id, hall_id)
);

create table film_seance
(
    film_id INT references films,
    seance_id INT references seances,
    primary key (film_id, seance_id)
);

create table transaction_seance
(
    transaction_id INT references transactions,
    seance_id INT references seances,
    primary key (transaction_id, seance_id)
);