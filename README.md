# CONSULTAS DE SQL 

1. SELECT c.*
FROM categoria c
LEFT JOIN productos p ON c.id = p.categoria_id
WHERE p.id IS NULL;

2. SELECT c.id AS categoria_id, c.nombre AS categoria_nombre, COUNT(p.id) AS total_productos
FROM categoria c
LEFT JOIN productos p ON c.id = p.categoria_id
GROUP BY c.id, c.nombre;

3. SELECT p.id AS producto_id, p.nombre AS producto_nombre, p.precio, p.categoria_id
FROM productos p
JOIN (
    SELECT categoria_id, AVG(precio) AS promedio_precio
    FROM productos
    GROUP BY categoria_id
) subconsulta ON p.categoria_id = subconsulta.categoria_id
WHERE p.precio > subconsulta.promedio_precio;

# COMANDOS PARA GIT QUE USE PARA LA PRUEBA

git init // INICIAR EL GIT
git add . // SE AGREGAN LOS ARCHIVOS PARA TENERLOS LISTO PARA HACER LA SUBIDA
git commit -m "MENSAJE DEL COMMIT" // DARLE UNA DESCRIPCION A LOS CAMBIOS QUE SUBIRE
git remote add origin "URL DE MI GIT GENERADO" // CONECTO EL REPOSITORIO LOCAL CON EL REMOTO
git push -u origin main // SE SUBE LA RAMA main AL REMOTO
git checkout -b developer // ESTANDO PARADO EN LA RAMA MAIN SE CREA DEVELPMENT EN BASE A MAIN
git push -u origin development // SUBO TAMBIEN LA RAMA DEVELOPMENT AL REMOTO
git checkout -nombre de la rama // PARA PASARME DE RAMA EN RAMA SI LO NECESITO
git push origin (nombre de la rama a la cual se subieran los cambios) ejemplo git push origin development

para los pull request entro a mi git hub en el navegador le doy en compare pull request reviso cambios
fusiono los cambios (MERGE) de development hacia main y confirmo el merge y listo

git pull origin (nombre de la rama a la cual quiero bajar los cambios para estar actualizado)