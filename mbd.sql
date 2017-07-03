/*============================================Query 1====================================================*/
/*hash join*/
SELECT buku.* FROM buku, penerbit
WHERE buku.no_penerbit= penerbit.
no_penerbit ;

/*Nested Join Query Scalar :*/

SELECT*FROM buku WHERE
buku.no_penerbit IN(SELECT
no_penerbit FROM penerbit);

/*Nested Join Correlated :*/

SELECT * FROM buku WHERE
buku.no_penerbit IN(SELECT
penerbit.no_penerbit FROM penerbit WHERE
buku.no_penerbit=penerbit.no_penerbit);


/*============================================Query 2====================================================*/

/*Hash Join Query :*/

SELECT buku.* FROM buku, penerbit,
ko_terbit WHERE buku.no_penerbit=
penerbit. no_penerbit AND
penerbit.id_kt = ko_terbit.id_kt;

/*Nested Join Query Scalar :*/

SELECT * FROM buku WHERE
buku.no_penerbit IN(SELECT
penerbit.no_penerbit FROM penerbit WHERE
penerbit.id_kt IN(SELECT id_kt FROM
ko_terbit));

/*Nested Join Correlated :*/

SELECT * FROM buku WHERE
buku.no_penerbit IN(SELECT
no_penerbit FROM penerbit WHERE
buku.no_penerbit=penerbit.no_penerbit AND penerbit.id_kt IN(SELECT `penerbit`.`Id_Kt` FROM ko_terbit,penerbit WHERE penerbit.id_kt=ko_terbit.id_kt ));

/*============================================Query 3====================================================*/

/*Hash Join Query :*/

SELECT buku.* FROM buku, penerbit,
ko_terbit, klasifikasi WHERE buku.
no_penerbit = penerbit. no_penerbit
AND penerbit. id_kt = ko_terbit.
id_kt AND buku.no_klas =
klasifikasi.no_klas;

/*Nested Join Query Scalar :*/

SELECT * FROM buku WHERE
buku.no_penerbit IN(SELECT
no_penerbit FROM penerbit WHERE
penerbit.id_kt IN(SELECT id_kt FROM
ko_terbit)) AND buku.id_jenis IN (SELECT id_jenis FROM jenis);

/*Nested Join Correlated :*/

SELECT * FROM buku WHERE
buku.no_penerbit IN(SELECT
no_penerbit FROM penerbit WHERE
buku.no_penerbit=penerbit.no_penerbit AND penerbit.id_kt IN(SELECT id_kt
FROM ko_terbit WHERE
penerbit.Id_Kt=ko_terbit.Id_Kt ) AND
buku.id_jenis IN(SELECT id_jenis
FROM jenis WHERE
buku.id_jenis=jenis.id_jenis ));

SELECT Id_Kt FROM penerbit

SELECT Id_Kt FROM ko_terbit ko INNER JOIN  Penerbit p ON p.Id_Kt =ko.Id_Kt 


/*============================================Query 4====================================================*/

/*Hash Join Query :*/

SELECT buku.* FROM buku, penerbit,
ko_terbit, klasifikasi, jenis WHERE
buku.no_penerbit =
penerbit.no_penerbit AND
penerbit.id_kt = ko_terbit.id_kt AND
buku.id_jenis = jenis.id_jenis AND
buku.no_klas = klasifikasi.no_klas;

/*Nested Join Query Scalar :*/

SELECT * FROM buku WHERE
buku.no_penerbit IN(SELECT
no_penerbit FROM penerbit WHERE
penerbit.id_kt IN(SELECT id_kt FROM
ko_terbit)) AND buku.id_jenis IN
(SELECT id_jenis FROM jenis) AND
buku.no_klas IN(SELECT no_klas FROM
klasifikasi);

/*Nested Join Correlated :*/

SELECT * FROM buku WHERE
buku.no_penerbit IN (SELECT
no_penerbit FROM penerbit WHERE
buku.no_penerbit
=penerbit.no_penerbit AND
penerbit.id_kt IN (SELECT id_kt
FROM ko_terbit WHERE
penerbit.id_kt=ko_terbit.id_kt))
AND buku.id_jenis IN (SELECT
id_jenis FROM jenis WHERE
buku.id_jenis=jenis.id_jenis) AND
buku.no_klas IN(SELECT no_klas FROM
klasifikasi WHERE buku.no_klas =
klasifikasi.no_klas)