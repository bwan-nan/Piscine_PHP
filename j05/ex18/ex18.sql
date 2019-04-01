SELECT `name`
FROM `distrib`
WHERE id_distrib = 42
OR id_distrib = 62 BETWEEN 62 AND 69
OR id_distrib = 71
OR id_distrib BETWEEN 88 AND 90
OR length(name) - length(replace(name, 'y', '')) = 2
OR length(name) - length(replace(name, 'Y', '')) = 2
LIMIT 2,5;
