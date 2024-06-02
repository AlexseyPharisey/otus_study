create table films
(
    id serial PRIMARY KEY,
    title varchar(255),
    movie_critic varchar(255),
    description text
);

create table attributes
(
    id serial PRIMARY KEY,
    name varchar(255)
);

create table attribute_types
(
    id serial PRIMARY KEY,
    name varchar(255)
);

create table values
(
    id serial PRIMARY KEY,
    film_id INT REFERENCES films (id),
    attribute_id INT REFERENCES attributes (id),
    attribute_type_id INT REFERENCES attribute_types (id),
    text_value text,
    date_value date,
    bool_value bool,
    float_value float
);

CREATE INDEX idx_values_film_id ON values (film_id);
CREATE INDEX idx_values_attribute_id ON values (attribute_id);
CREATE INDEX idx_values_attribute_type_id ON values (attribute_type_id);

insert into films (title, movie_critic, description)
values ('Дюна: Часть вторая', 'Андре Базен', 'Фантастика'),
       ('Зелёная книга', 'Полин Каэль', 'Драма'),
       ('Джентльмены', 'Леонард Малтин', 'Комедия, боевик'),
       ('Kingsman: Секретная служба', 'Питер Трэверс', 'Приключения, боевик, комедия'),
       ('Первому игроку приготовиться', 'Александр Соколов', 'Фантастика, приключения');

insert into attribute_types (name)
values ('Рецензии'),
       ('Отзыв'),
       ('Премия'),
       ('Важные даты'),
       ('Служебные даты'),
       ('Рейтинг');

insert into attributes (name)
values ('Рецензии критиков'),
       ('Отзыв неизвестной киноакадемии'),
       ('Оскар'),
       ('Мировая премьера'),
       ('Премеьера в РФ'),
       ('Дата начала продажи билетов'),
       ('Дата, когда нужно запускать рекламу на ТВ'),
       ('Мировой рейтинг');

insert into values (film_id, attribute_id, attribute_type_id, text_value, date_value, bool_value, float_value)
values (1, 1, 1, 'Фильм отлично подойдет для арабов', null, null, null),
       (1, 2, 2, 'Отличная экранизация старой Дюны', null, null, null),
       (1, 4, 4, null, '2024-01-25', null, null),
       (1, 6, 4, null, '2024-03-01', null, null),
       (1, 3, 3, null, null, false, null),
       (1, 8, 6, null, null, null, 8.7),

       (2, 1, 1, 'Фильм для семеного просмотра', null, null, null),
       (2, 2, 2, 'Можно было и получше снять', null, null, null),
       (2, 4, 4, null, '2018-07-14', null, null),
       (2, 6, 4, null, '2019-01-24', null, null),
       (2, 3, 3, null, null, true, null),
       (2, 8, 6, null, null, null, 9.7),

       (3, 1, 1, 'Гай Ричи как всегда на высоте', null, null, null),
       (3, 2, 2, 'Как в старые добрые времена', null, null, null),
       (3, 4, 4, null, '2018-12-26', null, null),
       (3, 6, 4, null, '2019-02-13', null, null),
       (3, 3, 3, null, null, true, null),
       (3, 8, 6, null, null, null, 9.5),

       (4, 1, 1, 'Интересный фильм про секретную службу в Англии', null, null, null),
       (4, 2, 2, 'Ну такое', null, null, null),
       (4, 4, 4, null, '2015-01-29', null, null),
       (4, 6, 4, null, '2015-02-12', null, null),
       (4, 3, 3, null, null, false, null),
       (4, 8, 6, null, null, null, 7.6),

       (5, 1, 1, 'Нам всё понравилось, сын с мужем остались довольны', null, null, null),
       (5, 2, 2, 'Фильм показывает наше скорое будущее', null, null, null),
       (5, 4, 4, null, '2018-03-29', null, null),
       (5, 6, 4, null, '2018-04-15', null, null),
       (5, 3, 3, null, null, true, null),
       (5, 8, 6, null, null, null, 10.0);