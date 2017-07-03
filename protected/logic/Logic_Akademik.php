<?php
prado::using ('Application.logic.Logic_Mahasiswa');
class Logic_Akademik extends Logic_Mahasiswa {			
    /**
     * daftar semester matakuliah
     * @var type 
     */
    public static $SemesterMatakuliah = array ('none'=>' ',1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>'Matkul Pilihan Ganjil',10=>'Matkul Pilihan Genap');
    /**
     * daftar semester matakuliah bentuk romawi
     * @var type 
     */
    public static $SemesterMatakuliahRomawi = array (1=>'I',2=>'II',3=>'III',4=>'IV',5=>'V',6=>'VI',7=>'VII',8=>'VIII');
    /**
     * daftar sks matakuliah
     * @var type 
     */
    public static $sks = array (0=>'0',1=>'1',2=>'2',3=>'3',4=>'4',5=>'5',6=>'6');   
    /**
     * informasi matakuliah
     * @var type array
     */
    public $InfoMatkul = array();
    /**
     * informasi kelas
     * @var type array
     */
    public $InfoKelas = array();
	public function __construct ($db) {
		parent::__construct ($db);				
	}
    /**
     * digunakan untuk mendapatkan daftar semester matakuliah dalam bentuk romawi
     */
    public function getSemesterMatakuliahRomawi () {
        return Logic_Akademik::$SemesterMatakuliahRomawi;
    }
    /**
	* digunakan untuk mendapatkan kode kurikulum program studi yang berlaku
    * @return $idkurikulum
    * @version 1.0 beta
	*/
	public function getIDKurikulum ($kjur) {
        $str = "SELECT idkur FROM program_studi WHERE kjur=$kjur";
        $this->db->setFieldTable (array('idkur'));        
        $r=$this->db->getRecord($str);
        if (isset($r[1])) {
            return $r[1]['idkur'];
        }else{
            return 0;
        }
    }
    /**
	* digunakan untuk mendapatkan nama kurikulum program studi yang berlaku
    * @return $idkurikulum
    * @version 1.0 beta
	*/
	public function getKurikulumName ($kjur) {
        return '2014/2015';
    }
    /**
     * membersihkan kode matakuliah dari kurikulum
     * @param type $kode
     * @return kode matakuliah
     */
    public function getKMatkul ($kode) {
		$kmatkul=explode('_',$kode);
		return $kmatkul[1];
	}
    /**
     * digunakan untuk mendapatkan semester dan ta selanjutnya
     * @param type $tahun_sekarang
     * @param type $semester_sekarang
     * @return array
     */
	public function getNextSemesterAndTa ($tahun_sekarang,$semester_sekarang) {
		$data=array();
		if ($semester_sekarang == 1) {
			$data['semester']='Genap';
			$data['ta']=$tahun_sekarang . '-'.($tahun_sekarang+1);
		}elseif($semester_sekarang == 2) {
			$data['semester']='Ganjil';
			$data['ta']=($tahun_sekarang+1) . '-'.($tahun_sekarang+2);
		}
		return $data;
	}
    /**
     * digunakan untuk mendapatkan informasi suatu matakuliah berdasarkan idpenyelenggaraan
     * @param type $id
     * @param type $mode_info
     * @return array
     */
	public function getInfoMatkul($id,$mode_info) {        
		switch ($mode_info) {
			case 'penyelenggaraan' :
				$this->db->setFieldTable (array('idpenyelenggaraan','kmatkul','nmatkul','sks','semester','iddosen','nama_dosen','nidn','kjur','tahun','idsmt'));
				$str = "SELECT idpenyelenggaraan,kmatkul,nmatkul,sks,semester,iddosen,nama_dosen,nidn,kjur,tahun,idsmt FROM v_penyelenggaraan WHERE idpenyelenggaraan='$id'";
				$r=$this->db->getRecord($str);
				if (isset($r[1])) {
					$r[1]['kmatkul']=$this->getKmatkul($r[1]['kmatkul']);					
					$r[1]['jumlah_peserta']=$this->getJumlahMhsInPenyelenggaraan($id);
					$this->InfoMatkul=$r[1]; 
				}
			break;
			case 'pengampu_penyelenggaraan' :
				$this->db->setFieldTable (array('idpengampu_penyelenggaraan','idpenyelenggaraan','kmatkul','nmatkul','sks','semester','iddosen','nama_dosen','nidn','tahun','idsmt'));
				$str = "SELECT pp.idpengampu_penyelenggaraan,pp.idpenyelenggaraan,vp.kmatkul,vp.nmatkul,vp.sks,vp.semester,pp.iddosen,CONCAT(d.gelar_depan,' ',d.nama_dosen,',',d.gelar_belakang) AS nama_dosen,d.nidn,vp.tahun,vp.idsmt FROM v_penyelenggaraan vp,pengampu_penyelenggaraan pp,dosen d WHERE d.iddosen=pp.iddosen AND pp.idpenyelenggaraan=vp.idpenyelenggaraan AND pp.idpengampu_penyelenggaraan='$id'";
				$r=$this->db->getRecord($str);
				if (isset($r[1])) {
                    $idpenyelenggaraan=$r[1]['idpenyelenggaraan'];
                                        
                    $r[1]['kmatkul']=$this->getKmatkul($r[1]['kmatkul']);					
					$r[1]['jumlah_peserta']=$this->getJumlahMhsInPengampuPenyelenggaraan($id);
					$this->InfoMatkul=$r[1];
                    
                    $this->db->setFieldTable (array('nama_dosen','nidn'));
                    $str = "SELECT nidn,CONCAT(gelar_depan,' ',nama_dosen,',',gelar_belakang) AS nama_dosen FROM penyelenggaraan p,dosen d WHERE d.iddosen=p.iddosen AND p.idpenyelenggaraan=$idpenyelenggaraan";
					$r=$this->db->getRecord($str);
                    $this->InfoMatkul['nama_dosen_pengampu']=$r[1]['nama_dosen'];
                    $this->InfoMatkul['nidn_dosen_pengampu']=$r[1]['nidn'];
                    
				}
			break;
			case 'krsmatkul' :
				$this->db->setFieldTable (array('idpenyelenggaraan','kmatkul','nmatkul','sks','semester','iddosen','nama_dosen','nidn'));
				$str = "SELECT vp.idpenyelenggaraan,vp.kmatkul,vp.nmatkul,vp.sks,vp.semester,vp.iddosen,vp.nama_dosen,vp.nidn FROM v_penyelenggaraan vp,krsmatkul k WHERE k.idpenyelenggaraan=vp.idpenyelenggaraan AND k.idkrsmatkul='$id'";
				$r=$this->db->getRecord($str);				
				if (isset($r[1])) {
					$r[1]['kmatkul']=$this->getKmatkul($r[1]['kmatkul']);					
					$this->InfoMatkul=$r[1]; 					
				}
			break;			
		}	
        
        return $this->InfoMatkul; 
	}   
    /**
     * digunakan untuk mendapatkan informasi kelas berdasarkan idkelas_mhs
     * @param type $id
     * @return array
     */
	public function getInfoKelas($id) {
        $str = "SELECT km.idkelas_mhs,km.idkelas,km.nama_kelas,km.hari,km.jam_masuk,km.jam_keluar,vpp.iddosen,vpp.nama_dosen,vpp.nidn,vpp.kmatkul,vpp.nmatkul,vpp.sks,vpp.semester,vpp.idpenyelenggaraan,rk.namaruang,rk.kapasitas,vpp.idsmt,vpp.tahun,vpp.kjur,km.persen_quiz,km.persen_tugas,km.persen_uts,km.persen_uas,km.persen_absen,km.isi_nilai FROM kelas_mhs km JOIN v_pengampu_penyelenggaraan vpp ON (km.idpengampu_penyelenggaraan=vpp.idpengampu_penyelenggaraan) LEFT JOIN ruangkelas rk ON (rk.idruangkelas=km.idruangkelas) WHERE idkelas_mhs='$id'";
        $this->db->setFieldTable(array('idkelas_mhs','iddosen','iddosen','nama_dosen','nidn','kmatkul','nmatkul','sks','semester','idpenyelenggaraan','idkelas','nama_kelas','hari','jam_masuk','jam_keluar','namaruang','kapasitas','idsmt','tahun','kjur','persen_quiz','persen_tugas','persen_uts','persen_uas','persen_absen','isi_nilai'));
        $r = $this->db->getRecord($str);
        if (isset($r[1])) {
            $r[1]['kmatkul']=$this->getKmatkul($r[1]['kmatkul']);            
            $r[1]['jumlah_peserta']=$this->db->getCountRowsOfTable("kelas_mhs_detail WHERE idkelas_mhs=$id",'idkelas_mhs');
            $this->InfoKelas=$r[1];
            
            $idpenyelenggaraan=$r[1]['idpenyelenggaraan'];
            $str = "SELECT nama_dosen AS nama_dosen_matakuliah,nidn AS nidn_dosen_matakuliah FROM kelas_mhs km JOIN v_penyelenggaraan WHERE idpenyelenggaraan=$idpenyelenggaraan";
            $this->db->setFieldTable(array('nama_dosen_matakuliah','nidn_dosen_matakuliah'));
            $r = $this->db->getRecord($str);
            
            $this->InfoKelas['nama_dosen_matakuliah']=$r[1]['nama_dosen_matakuliah'];
            $this->InfoKelas['nidn_dosen_matakuliah']=$r[1]['nidn_dosen_matakuliah'];
        }
        return $this->InfoKelas;
    }
    /**
     * digunakan untuk mendapatkan jumlah mahasiswa dalam penyelenggaraan
     * @param type int $idpenyelenggaraan
     * @param type int $options 
     * @return type int
     */
	public function getJumlahMhsInPenyelenggaraan ($idpenyelenggaraan,$options=null) {        
		$jumlah_peserta = $jumlah_peserta=$this->db->getCountRowsOfTable(" krsmatkul km,krs k,register_mahasiswa rm WHERE k.idkrs=km.idkrs AND rm.nim=k.nim AND km.idpenyelenggaraan=$idpenyelenggaraan $options",'km.idkrsmatkul');	
        return $jumlah_peserta;	
	}	
    /**
     * digunakan untuk mendapatkan jumlah mahasiswa dalam pengampu penyelenggaraan
     * @param type $idpengampu_penyelenggaraan
     * @return type int
     */
	public function getJumlahMhsInPengampuPenyelenggaraan ($idpengampu_penyelenggaraan) {
        $str = "SELECT COUNT(vkm.nim) AS jmlh_peserta FROM v_krsmhs vkm JOIN pengampu_penyelenggaraan pp ON (pp.idpenyelenggaraan=vkm.idpenyelenggaraan) WHERE vkm.sah=1 AND vkm.batal=0 AND pp.idpengampu_penyelenggaraan='$idpengampu_penyelenggaraan' ";		
        $this->db->setFieldTable(array ('jmlh_peserta'));
        $result=$this->db->getRecord($str);
        return $result[1]['jmlh_peserta'];		
	}
    /**
     * digunakan untuk mengecek apakah krs telah sah atau belum
     * @return boolean
     * @throws Exception
     */
    public function isKrsSah ($tahun,$idsmt) {		
        $nim=$this->DataMHS['nim'];
        $str = "SELECT sah FROM krs WHERE idsmt=$idsmt AND tahun=$tahun AND nim='$nim'";			
        $this->db->setFieldTable(array('sah'));
        $r=$this->db->getRecord($str);
        $bool=false;
        if (isset($r[1])) {
            $bool=$r[1]['sah'];			
        }
        return $bool;
	}
    /**
     * digunakan untuk mendapatkan ketua program studi
     * @param type $kjur
     * @return type
     */
    public function getKetuaPRODI ($kjur) {
		$str = "SELECT k.kjur,d.nidn,CONCAT(d.gelar_depan,' ',d.nama_dosen,' ',d.gelar_belakang) AS nama_dosen,d.nipy,ja.nama_jabatan FROM program_studi k,dosen d,jabatan_akademik ja WHERE d.idjabatan=ja.idjabatan AND k.iddosen=d.iddosen AND k.kjur='$kjur'";
		$this->db->setFieldTable(array('idkjur','nidn','nama_dosen','nipy','nama_jabatan')); 
		$result=$this->db->getRecord($str);		
		return $result[1];
	}
    /**
     * digunakan untuk mendapatkan daftar dosen pada penyelenggaraan
     * @param type $idsmt
     * @param type $tahun
     * @return daftar dosen
     */
    public function getListDosenFromPenyelenggaraan ($idsmt,$tahun) {
        $str = "SELECT DISTINCT(pp.iddosen) AS iddosen,CONCAT(gelar_depan,' ',nama_dosen,gelar_belakang) AS nama_dosen,nidn FROM penyelenggaraan p,pengampu_penyelenggaraan pp,dosen d WHERE p.idpenyelenggaraan=pp.idpenyelenggaraan AND d.iddosen=pp.iddosen AND p.idsmt=$idsmt AND p.tahun=$tahun ORDER BY d.nama_dosen ASC";
		$this->db->setFieldTable(array('iddosen','nidn','nama_dosen'));
		$r=$this->db->getRecord($str);
        $result=array('none'=>' ');	
		if (isset($r[1])) {			
            while (list($k,$v)=each($r)) {
                $result[$v['iddosen']]=$v['nama_dosen']. ' ['.$v['nidn'].']';
            }			
		}
        return $result;
    }
    /**
     * digunakan untuk mendapatkan rekap status mahasiswa
     * @param type $periode_awal
     * @param type $periode_akhir
     * @param type $status
     * @return rekap status mahasiswa
     */
    public function getRekapStatusMHS ($kjur,$periode_awal,$periode_akhir,$k_status) {
        $str = "SELECT ta,idsmt,idkelas,jk,COUNT(nim) AS jumlah FROM rekap_status_mahasiswa WHERE (ta >= $periode_awal AND ta <= $periode_akhir) AND k_status='$k_status' AND kjur=$kjur GROUP BY ta,idsmt,idkelas,jk";
        $this->db->setFieldTable(array('ta','idsmt','idkelas','jk','jumlah'));			
        $r = $this->db->getRecord($str);  
        
        $result=array();
        if (isset($r[1])) {
            $temp_data1 =array();
            while (list($k,$v)=each ($r)) {            
                $index=$v['ta'].$v['idsmt'].$v['idkelas'];
                $data=array('index'=>$index,'ta'=>$v['ta'],'idsmt'=>$v['idsmt'],'idkelas'=>$v['idkelas'],'jumlah_pria'=>0,'jumlah_wanita'=>0,'jumlah'=>0);
                $temp_data1[$index]=$data;
            }     
            $i=1;
            while (list($m,$n)=each ($temp_data1)) {            
                reset($r);
                $temp_data2=array();
                while (list($a,$b)=each ($r)) {            
                    $index=$b['ta'].$b['idsmt'].$b['idkelas'];
                    if ($b['jk']=='L') {
                        $temp_data2[$index]['p']=$b['jumlah'];
                    }else{
                        $temp_data2[$index]['w']=$b['jumlah'];
                    }                                     
                } 
                $n['no']=$i;
                $n['jumlah_pria']=$temp_data2[$m]['p'] == ''?0:$temp_data2[$m]['p'];
                $n['jumlah_wanita']=$temp_data2[$m]['w'] == ''?0:$temp_data2[$m]['w'];
                $n['jumlah']=$temp_data2[$m]['p']+$temp_data2[$m]['w'];
                $result[$m]=$n;
                $i+=1;
            }
        }    
        return $result;  
    }    
}
?>