CREATE TABLE likes (
    id INT PRIMARY KEY,
    count INT DEFAULT 0
);

Добавьте начальные данные в таблицу likes, 
где у каждого id будет начальное значение count 0 или любое другое:

INSERT INTO likes (id, count) VALUES (1, 0), (2, 0), (3, 0), ...;
