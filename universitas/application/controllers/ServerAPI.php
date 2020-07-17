<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class ServerApi extends CI_Controller {
 
 		// fungsi untuk CREATE
 		public function addUniv()
 		{

 			// deklarasi variable
 			$name = $this->input->post('name');
 			$tempat = $this->input->post('tempat');
 			$singkatan = $this->input->post('singkatan');
 			$didirikan = $this->input->post('didirikan');
 			$letak = $this->input->post('letak');
 			// isikan variabel dengan nama file
 			$data['univ_name'] = $name;
 			$data['univ_tempat'] = $tempat;
 			$data['univ_singkatan'] = $singkatan;
 			$data['univ_didirikan'] = $didirikan;
 			$data['univ_letak'] = $letak;
 			$q = $this->db->insert('tb_univ', $data);
 			// check insert berhasil apa nggak
 			if ($q) {
 				$response['pesan'] = 'insert berhasil';
 				$response['status'] = 200;
 			} else {
 				$response['pesan'] = 'insert error';
 				$response['status'] = 404;
 			}
 			echo json_encode($response);
 		}
 		// fungsi untuk READ
 		public function getDataUniv()
 		{
 			$q = $this->db->get('tb_univ');
 			if ($q -> num_rows() > 0) {
 				$response['pesan'] = 'data ada';
 				$response['status'] = 200;
 				// 1 row
 				$response['univ'] = $q->row();
 				$response['univ'] = $q->result();
 			} else {
 				$response['pesan'] = 'data tidak ada';
 				$response['status'] = 404;
 			}
			echo json_encode($response);
 		}
 		// fungsi untuk DELETE
 		public function deleteUniv()
 		{
 			$id = $this->input->post('id');
 			$this->db->where('univ_id', $id);
 			$status = $this->db->delete('tb_univ');
 			if ($status == true) {
 				$response['pesan'] = 'hapus berhasil';
 				$response['status'] = 200;
 			} else {
 				$response['pesan'] = 'hapus error';
 				$response['status'] = 404;
 			}
 			echo json_encode($response);
 		}
 		// fungsi untuk UPDATE
 		public function updateUniv()
 		{
 			// deklarasi variable
 			$name = $this->input->post('name');
 			$tempat = $this->input->post('tempat');
 			$singkatan = $this->input->post('singkatan');
 			$didirikan = $this->input->post('didirikan');
 			$letak = $this->input->post('letak');
 			$this->db->where('univ_id', $id);
 			// isikan variabel dengan nama file
 			$data['univ_name'] = $name;
 			$data['univ_tempat'] = $tempat;
 			$data['univ_singkatan'] = $singkatan;
 			$data['univ_didirikan'] = $didirikan;
 			$data['univ_letak'] = $letak;
 			$q = $this->db->update('tb_univ', $data);
 			// check insert berhasil apa nggak
 			if ($q) {
 				$response['pesan'] = 'update berhasil';
 				$response['status'] = 200;
 			} else {
 				$response['pesan'] = 'update error';
 				$response['status'] = 404;
 			}
 			echo json_encode($response);
 		}
	}