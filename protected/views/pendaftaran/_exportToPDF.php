SELECT
    prd_mahasiswa.NIM
    , prd_mahasiswa.Nama
    , prd_pendaftaran.KodePembimbing1
    , prd_pendaftaran.KodePembimbing2
    , prd_sidangmaster.Tanggal
    , prd_jenissidang.NamaSidang
    , prd_sidangmaster.status
    , prd_dosen.NamaDosen
    , prd_dosen.IdUser
    , prd_sidangmaster.Tanggal
    , prd_sidangmaster.IDJenisSidang
    , prd_nilaikp.IdNilaiKp
    , prd_nilaikp.NilaiPembimbing
    , prd_nilaikp.NilaiPenguji
    , prd_nilaikp.NilaiPerusahaan
    , prd_nilaikp.NA
    , prd_nilaikp.Index
FROM
    sttitpi_skkp.prd_sidangmaster
    INNER JOIN sttitpi_skkp.prd_jenissidang 
        ON (prd_sidangmaster.IDJenisSidang = prd_jenissidang.IDJenisSidang)
    INNER JOIN sttitpi_skkp.prd_pendaftaran 
        ON (prd_pendaftaran.IdSidang = prd_sidangmaster.IdSidang)
    INNER JOIN sttitpi_skkp.prd_mahasiswa 
        ON (prd_pendaftaran.NIM = prd_mahasiswa.NIM)
    LEFT JOIN sttitpi_skkp.prd_dosen 
        ON (prd_pendaftaran.KodePembimbing1 = prd_dosen.KodeDosen) 
    LEFT JOIN sttitpi_skkp.prd_nilaikp  ON (prd_nilaikp.NIM = prd_mahasiswa.NIM)
       

WHERE  prd_sidangmaster.IDJenisSidang='1' AND prd_pendaftaran.KodePembimbing1='AW' 