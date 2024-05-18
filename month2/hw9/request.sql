SELECT
    f.title AS film_name,
    a.name AS attribute,
    at.name AS type,
    CONCAT(
            v.text_value,
            v.date_value,
            text(v.bool_value),
            v.float_value
    ) AS value
FROM
values v
    INNER JOIN attributes a ON a.id = v.attribute_id
    INNER JOIN attribute_types at ON at.id = v.attribute_type_id
    INNER JOIN films f ON f.id = v.film_id;