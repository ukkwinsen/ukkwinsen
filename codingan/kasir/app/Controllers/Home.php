<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{
    public function index()
    {
        echo view('sign_in');
    }

    public function aksi_login()
    {
        $n=$this->request->getPost('username'); 
        $p=$this->request->getPost('password');

        $model= new M_model();
        $data=array(
            'username'=>$n, 
            'password'=>md5($p)
        );
        $cek=$model->getarray('user', $data);
        if ($cek>0) {
            $where=array('id_userr'=>$cek['id_user']);
            $karyawan=$model->getarray('pekerja', $where);

                if ($karyawan) { 
                session()->set('id', $cek['id_user']);
                session()->set('username', $cek['username']);
                session()->set('nama_pekerja', $karyawan['nama_pekerja']);
                session()->set('level', $cek['level']);

                return redirect()->to('/home/dashboard');
            } else {
                $where = array('id_userr' => $cek['id_user']);
                $pengguna = $model->getarray('pelanggan', $where);

                if ($pengguna) { 
                    session()->set('id', $cek['id_user']);
                    session()->set('username', $cek['username']);
                    session()->set('nama_pelanggan', $pengguna['nama_pelanggan']);
                    session()->set('level', $cek['level']);

                    return redirect()->to('/home/dashboard');
                }
            }
        }
        return redirect()->to('/');
    }

    public function sign_in()
    {
        echo view('sign_in');
    }

    public function sign_up()
    {
        echo view('sign_up');
    }

    public function aksi_register()
    {
        $model=new M_model();

        $nama_pelanggan=$this->request->getPost('nama_pelanggan');
        $telepon=$this->request->getPost('telepon');
        $username=$this->request->getPost('username');
        $password=$this->request->getPost('password');

        $user=array(
            'username'=>$username,
            'password'=>md5($password),
            'level'=> '3',
        );

        $model=new M_model();
        $model->simpan('user', $user);
        $where=array('username'=>$username);
        $id=$model->getarray('user', $where);
        $iduser = $id['id_user'];

        $pengguna = array(
            'nama_pelanggan' => $nama_pelanggan,
            'telepon' => $telepon,
            'id_userr' => $iduser,
        );
        $model->simpan('pelanggan', $pengguna);

        return redirect()->to('/');
    }

    public function dashboard()
    {
        echo view('header');
        echo view('menu');
        echo view('footer');
    }

    public function pekerja()
    {
        $model=new M_model();
        $on='pekerja.id_userr=user.id_user';
        $data['winsen']=$model->fusion('pekerja', 'user', $on);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('header',$data);
        echo view('menu');
        echo view('pekerja');
        echo view('footer'); 
    }

    public function tambah_pekerja()
    {
        $model=new M_model();
        $on='pekerja.id_userr=user.id_user';
        $data['winsen']=$model->fusion('pekerja', 'user', $on);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('header',$data);
        echo view('menu');
        echo view('tambah_pekerja');
        echo view('footer'); 
    }

    public function aksi_tambah_pekerja()
    {
        $model=new M_model();

        $nama_pekerja=$this->request->getPost('nama_pekerja');
        $alamat=$this->request->getPost('alamat');
        $telepon=$this->request->getPost('telepon');
        $username=$this->request->getPost('username');
        $password=$this->request->getPost('password');
        $level=$this->request->getPost('level');

        $user=array(
            'username'=>$username,
            'password'=>md5('kasir'),
            'level'=>$level,
        );

        $model=new M_model();
        $model->simpan('user', $user);
        $where=array('username'=>$username);
        $id=$model->getarray('user', $where);
        $iduser = $id['id_user'];

        $pekerja=array(
            'nama_pekerja'=>$nama_pekerja,
            'alamat'=>$alamat,
            'telepon'=>$telepon,
            'id_userr'=>$iduser,
        );
        $model->simpan('pekerja', $pekerja);
        return redirect()->to('/home/pekerja');
    }

    public function reset($id)
    {
        $model=new M_model();
        $where=array('id_user'=>$id);
        $data=array(
            'password'=>md5('kasir')
        );
        $model->edit('user',$data,$where);
        return redirect()->to('/home/pekerja');
    }

    public function resett($id)
    {
        $model=new M_model();
        $where=array('id_user'=>$id);
        $data=array(
            'password'=>md5('kasir')
        );
        $model->edit('user',$data,$where);
        return redirect()->to('/home/pelanggan');
    }

    public function edit_pekerja($id)
    {
        $model=new M_model();
        $where2=array('pekerja.id_userr'=>$id);
        $on='pekerja.id_userr=user.id_user';
        $data['winsen']=$model->edit_petugas('pekerja', 'user',$on, $where2);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('header',$data);
        echo view('menu');
        echo view('edit_pekerja');
        echo view('footer');
    }

    public function aksi_edit_pekerja()
    {
        $id= $this->request->getPost('id');
        $nama_pekerja=$this->request->getPost('nama_pekerja');
        $alamat=$this->request->getPost('alamat');
        $telepon=$this->request->getPost('telepon');
        $username=$this->request->getPost('username');
        $password=$this->request->getPost('password');
        $level=$this->request->getPost('level');

        $where=array('id_user'=>$id);    
        $where2=array('id_userr'=>$id);
        if ($password !='') {
            $user=array(
                'username'=>$username,
                'level'=>$level,
            );
        }else{
            $user=array(
                'username'=>$username,
                'level'=>$level,
            );
        }

        $model=new M_model();
        $model->edit('user', $user,$where);

        $pekerja=array(
            'nama_pekerja'=>$nama_pekerja,
            'alamat'=>$alamat,
            'telepon'=>$telepon,
        );
        $model->edit('pekerja', $pekerja, $where2);
        return redirect()->to('/home/pekerja');
    }

    public function hapus_pekerja($id)
    {
        $model=new M_model();
        $where2=array('id_user'=>$id);
        $where=array('id_userr'=>$id);
        $model->hapus('pekerja',$where);
        $model->hapus('user',$where2);
        return redirect()->to('/home/pekerja');
    }


    public function pelanggan()
    {
        $model=new M_model();
        $on='pelanggan.id_userr=user.id_user';
        $data['winsen']=$model->fusion('pelanggan', 'user', $on);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('header',$data);
        echo view('menu');
        echo view('pelanggan');
        echo view('footer'); 
    }

    public function hapus_pelanggan($id)
    {
        $model=new M_model();
        $where2=array('id_user'=>$id);
        $where=array('id_userr'=>$id);
        $model->hapus('pelanggan',$where);
        $model->hapus('user',$where2);
        return redirect()->to('/home/pelanggan');
    }


    public function barang()
    {
        $model=new M_model();
        $data['winsen']=$model->tampil('barang');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('header',$data);
        echo view('menu');
        echo view('barang');
        echo view('footer'); 
    }

    public function tambah_barang()
    {
        $model=new M_model();
        $data['winsen']=$model->tampil('barang');

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $data['foto']=$model->getRow('user',$where);

        echo view('header',$data);
        echo view('menu');
        echo view('tambah_barang');
        echo view('footer');
    }

    public function aksi_tambah_barang()
    {
        $model=new M_model();
        $barang=$this->request->getPost('barang');
        $harga=$this->request->getPost('harga');
        $data=array(

            'barang'=>$barang,
            'harga'=>$harga,
            'jumlah'=>'0',
        );

        $model->simpan('barang',$data);
        return redirect()->to('/home/barang');
    }

    public function edit_barang($id)
    {
        $model=new M_model();
        $where=array('barang.id_barang'=>$id);

        $data['winsen']=$model->getRow('barang', $where);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('header',$data);
        echo view('menu');
        echo view('edit_barang');
        echo view('footer');
    }

    public function aksi_edit_barang()
    {
        $model=new M_model();
        $id=$this->request->getPost('id');
        $barang=$this->request->getPost('barang');
        $harga=$this->request->getPost('harga');
        $data=array(

            'barang'=>$barang,
            'harga'=>$harga,
        );

        $where=array('id_barang'=>$id);
        $model->edit('barang',$data,$where);

        return redirect()->to('/home/barang');
    }

    public function hapus_barang($id)
    {
        $model=new M_model();
        $where=array('id_barang'=>$id);
        $model->hapus('barang',$where);
        return redirect()->to('home/barang');
    }

    public function barang_masuk()
    {
        $model=new M_model();
        $on='barang_masuk.id_barang=barang.id_barang';
        $data['winsen']=$model->fusion('barang_masuk', 'barang', $on);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('header',$data);
        echo view('menu');
        echo view('barang_masuk');
        echo view('footer'); 
    }

    public function tambah_bm()
    {
        $model=new M_model();
        $data['winsen']=$model->tampil('barang_masuk');

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $data['foto']=$model->getRow('user',$where);

        $data['brg']=$model->tampil('barang');

        echo view('header',$data);
        echo view('menu');
        echo view('tambah_bm');
        echo view('footer');
    }

    public function aksi_tambah_bm()
    {
        $model=new M_model();
        $id_barang=$this->request->getPost('id_barang');
        $stok=$this->request->getPost('stok');
        $data=array(

            'id_barang'=>$id_barang,
            'stok'=>$stok,
        );

        $model->simpan('barang_masuk',$data);
        return redirect()->to('/home/barang_masuk');
    }

    public function hapus_bm($id)
    {
        $model=new M_model();
        $where=array('id_bm'=>$id);
        $model->hapus('barang_masuk',$where);
        return redirect()->to('/home/barang_masuk');
    }


    public function barang_keluar()
    {
        $model=new M_model();
        $on='barang_keluar.id_barang=barang.id_barang';
        $data['winsen']=$model->fusion('barang_keluar', 'barang', $on);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('header',$data);
        echo view('menu');
        echo view('barang_keluar');
        echo view('footer'); 
    }

    public function tambah_bk()
    {
        $model=new M_model();
        $data['winsen']=$model->tampil('barang_keluar');

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $data['foto']=$model->getRow('user',$where);

        $data['brg']=$model->tampil('barang');

        echo view('header',$data);
        echo view('menu');
        echo view('tambah_bk');
        echo view('footer');
    }

    public function aksi_tambah_bk()
    {
        $model=new M_model();
        $id_barang=$this->request->getPost('id_barang');
        $stok=$this->request->getPost('stok');
        $nama_pembeli=$this->request->getPost('nama_pembeli');
        $total_harga=$this->request->getPost('total_harga');
        $data=array(

            'id_barang'=>$id_barang,
            'stok'=>$stok,
            'nama_pembeli'=>$nama_pembeli,
            'total_harga'=>$total_harga,
        );

        $model->simpan('barang_keluar',$data);
        return redirect()->to('/home/barang_keluar');
    }

    public function hapus_bk($id)
    {
        $model=new M_model();
        $where=array('id_bk'=>$id);
        $model->hapus('barang_keluar',$where);
        return redirect()->to('home/barang_keluar');
    }

    public function logout()
    {
        $model = new M_model();
        $id = session()->get('id');

        session()->destroy();
        return redirect()->to('/');
    }
}
