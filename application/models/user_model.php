<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
	
	function get_all_user()
	{
		$this->db->select('*')->from('master_user');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_all_user_complete()
	{
		$this->db->select('mu.*,ur.nama_role');
		$this->db->from('master_user as mu');
		$this->db->join('user_role as ur', 'ur.id_role = mu.id_role','left');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_log_user()
	{
		$this->db->select('mu.*,ur.nama_role,l.date_created');
		$this->db->from('master_user as mu');
		$this->db->join('user_role as ur', 'ur.id_role = mu.id_role','left');
		$this->db->join('loginlog as l', 'l.user_id = mu.id_user','left');
		$this->db->order_by("l.date_created", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}

	function get($id_user)
	{
		$this->load->database();
		$query = $this->db->get_where('master_user',array('id_user'=>$id_user));
		return $query->row_array();
	}

	function simpan_data()
	{
		$simpan_data=array
		(
			'id_user'		=>$this->input->post(''),
			'nama_lengkap'	=>$this->input->post('nama_lengkap'),
			'username'		=>$this->input->post('nama_user'),
			'password'		=>md5("xx-".$this->input->post('password')."-xx"),
			'id_role'		=>$this->input->post('id_role'),
			'email'			=>$this->input->post('email'),
			'id_kartu'		=>$this->input->post('id_kartu'),
			'alamat'		=>$this->input->post('alamat'),
			'no_phone'		=>$this->input->post('no_phone')

		);

		$simpan = $this->db->insert('master_user',$simpan_data);
		return $simpan;
		
	}
	public function update_data()
        {
            $data=array(
				'password'		=>md5("xx-".$this->input->post('password')."-xx")
			);
				$this->db->where('id_user',$this->input->post('id_user'));
                $this->db->update('master_user', $data);
        }

    function update_data_detail()
        {
            $data=array(
			'nama_lengkap'	=>$this->input->post('nama_lengkap'),
			//'username'		=>$this->input->post('nama_user'),
			'id_role'		=>$this->input->post('id_role'),
			'email'			=>$this->input->post('email'),
			'id_kartu'		=>$this->input->post('id_kartu'),
			'alamat'		=>$this->input->post('alamat'),
			'no_phone'		=>$this->input->post('no_phone')
			);
				$this->db->where('id_user',$this->input->post('id_user'));
                $this->db->update('master_user', $data);
        }


	function update_data_detail_photos($id_user,$img_file)
        {
            $data=array(
			'img_file'	=>$img_file
			);
				$this->db->where('id_user',$id_user);
                $this->db->update('master_user', $data);
        }

    function hapus($id_user){
	$this->db->query("delete from master_user where id_user = $id_user");
	}	
	
	function get_all_role()
	{
		$this->db->select('*');
		$this->db->from('user_role');
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function cek_username($username){
		$this->db->select('*');
		$this->db->from('master_user');
		$this->db->where('username',$username);
		$result = $this->db->get();
		return $result->row_array();
	}
	
}
