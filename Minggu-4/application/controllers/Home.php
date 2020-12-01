<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->helper(array('form', 'url', 'html'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model(array('m_crud'));
    }

	public function index()
	{
        if ($this->session->userdata('status') == 'login') {
            redirect('home/article');
        }
		$this->load->view('home/login');
    }

    public function register()
    {
        $this->load->view('register');
    }

    public function registerProcess()
    {
        $this->form_validation->set_rules('username','Username','required',array('required' => 'Username wajib diisi'));
        $this->form_validation->set_rules('email','Email','required|trim|valid_email',array('required' => 'Email wajib diisi', 'valid_email' => 'Email Tidak benar'));
        $this->form_validation->set_rules('password','Password','required|trim',array('required' => 'Password wajib diisi'));
    
        if($this->form_validation->run() != false){

            $username   = $this->input->post('username');
            $email      = $this->input->post('email');
            $password   = $this->input->post('password');

            $data = [
                'username'  => $username,
                'email'     => $email,
                'password'  => $password,
                'role'      => 1002, // 1002 => user biasa, 1001 => admin
            ];

            $this->m_crud->insertUser('user', $data);
            $this->session->set_flashdata("success_insert_user", "Pendaftar Telah Berhasil");

            redirect('home');
        } else {
            $this->register();
        }
    }

    public function loginAction()
    {
       
        $this->form_validation->set_rules('username','Username','required',array('required' => 'Username wajib diisi'));
        $this->form_validation->set_rules('password','Password','required|trim',array('required' => 'Password wajib diisi'));

        if($this->form_validation->run() != false){

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $where = [ 
                'username'  => $username,
            ];

            $cekQuery = $this->m_crud->loginQuery($where)->row();

            if($cekQuery){
                $data = $cekQuery;
                if($data->password == $password){
                    $truePass = true;
                } 
                else $truePass = false;
                $roleAccess     = $cekQuery->role;

                if($truePass){

                    $sess_data['id']        = $cekQuery->id;
                    $sess_data['username']  = $cekQuery->username;
                    $sess_data['email']     = $cekQuery->email;
                    $sess_data['role']      = $cekQuery->role;
                    $sess_data['status']    = "login";
    
                    $this->session->set_userdata($sess_data);
    
                    if($roleAccess == 1002){
                        echo "user biasa";
                        redirect('home/article');
                        return 0;
                    } else if($roleAccess == 1001){
                        echo "admin";
                        redirect('home/article');
                        return 0;
                    }
                } else {
                    echo "password salah";
                    return 0;
                }

            } else {
                echo "Data User Tidak ada, Silakan Daftar Terlebihdahulu";
                return 0;
            }

        } else {
            $this->index();
        }

    }

        public function article()
    {
        if($this->session->userdata("status") == "login"){

            $data['dataArticle'] = $this->m_crud->getArticle()->result();

            $this->load->view('home/dataArticle', $data);            
        } else {
            redirect('home', 'refresh');
        }
    }

    public function tambahArticle()
    {
        if($this->session->userdata("status") == "login"){
            $this->load->view('home/addArticle', array('error' => ' '));
        } else {
            redirect('home', 'refresh');
        }
    }

    public function tambahArticles()
    {
        $this->form_validation->set_rules('title','Title','required',array('required' => 'Judul wajib diisi'));
        $this->form_validation->set_rules('article','Article','required',array('required' => 'Artikel Wajib di Isi'));

        if($this->form_validation->run() != false){
            
            $config['upload_path']          =   './upload   /';
            $config['allowed_types']        =   'gif|png|jpg';
            $config['max_size']             =   10000;

            $this->load->library('upload' ,$config);
            $this->upload->initialize($config);

            $title      = $this->input->post('title');
            $article    = $this->input->post('article');

            if (!$this->upload->do_upload('cover_img')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('home/addArticle', $error);
                return 0;
                $this->session->set_flashdata('error_upload_Images' ,'gagal upload Images');
            } else {
    
                $data = array('upload_data' => $this->upload->data());
                $name = $data['upload_data'];
    
                $data = array(
                    'user_id'   => $this->session->userdata('id'),
                    'title'     => $title,
                    'article'   => $article,
                    'cover_img' => $name['file_name'],
                );
    
                $this->m_crud->uploadArticle('article', $data);
                $this->session->set_flashdata('success', 'Artikel Berhasil ditambahkan');
                redirect('home/article', 'refresh');
                return 0;
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home', 'refresh');
    }

        public function deleteArticle($id)
    {
        $where = ['id' => $id];
        $this->m_crud->deleteArticle($where, "article");
        $this->session->set_flashdata('success', 'Berhasil Menghapus Artikel');
        
        redirect('home/article');
        return 0;
    }

    public function update($id)
    {
        $where = [ 'id' => $id ];
        $data['article'] = $this->m_crud->getUpdate("article", $where)->result();
        $this->load->view('home/updateArticle', $data);
    }

    public function updates()
    {
        $this->form_validation->set_rules('title','Title','required',array('required' => 'Judul wajib diisi'));
        $this->form_validation->set_rules('article','Article','required',array('required' => 'Artikel Wajib di Isi'));

        if($this->form_validation->run() != false){
            
            $config['upload_path']          =   './upload   /';
            $config['allowed_types']        =   'gif|png|jpg';
            $config['max_size']             =   10000;

            $this->load->library('upload' ,$config);
            $this->upload->initialize($config);

            $title      = $this->input->post('title');
            $article    = $this->input->post('article');
            $id         = $this->input->post('id');

            $where = ['id' => $id];

            if (!$this->upload->do_upload('cover_img')) {

                $data = array(
                    'title'     => $title,
                    'article'   => $article,
                );

                $this->m_crud->updateArticle('article', $data, $where);
                $this->session->set_flashdata('success', 'Berhasil Memperbaharui Artikel');
                redirect('home/article', 'refresh');

                // $error = array('error' => $this->upload->display_errors());
                // $this->load->view('home/article', $error);
                // return 0;
            } else {
    
                $data = array('upload_data' => $this->upload->data());
                $name = $data['upload_data'];

                $data = array(
                    'title'     => $title,
                    'article'   => $article,
                    'cover_img' => $name['file_name'],
                );

                $this->m_crud->updateArticle('article', $data, $where);
                $this->session->set_flashdata('success', 'Berhasil Memperbaharui Artikel');
                redirect('home/article', 'refresh');
                return 0;
            }
        }
    }
}
