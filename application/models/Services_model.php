<?php

class Services_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
		public function show_service()
		{
			$this->db->from("services");
			return $this->db->get()->result_array();
		}

		public function get_data($id, $select = null){
			if (!empty($select)){
				$this->db->select($select);
			}
			$this->db->from("services");
			$this->db->where("service_id", $id);
			return $this->db->get();
		}

		public function insert($data){
			$this->db->insert("services", $data);
		}

		public function update($id, $data){
				$this->db->where("service_id", $id);
				$this->db->update("services", $data);
			}

		public function delete($id){
			$this->db->where("service_id", $id);
			$this->db->delete("services");
		}

		public function is_duplicated($field, $value, $id = null) {
 			if (!empty($id)){
 				$this->db->where("service_id <>", $id);
 			}
 			$this->db->from("services");
 			$this->db->where($field, $value);
 			return $this->db->get()->num_rows() > 0;
		}

		/*
			CAMPOS VIA POST
			$_POST['search']['value'] = Campo para busca
			$_POST['order'] = [[0, 'asc']]
			  $_POST['order'][0]['column'] = index da coluna
			  $_POST['order'][0]['dir'] = tipo de ordenação (asc, desc)
			  $_POST['length'] = Quantos campos mostrar
			  $_POST['start'] = Qual posição começar
		*/

		var $column_search = array("service_name", "service_description");
		var $column_order = array("service_name","", "service_id");

		private function _get_datatable(){
			$search = NULL;
			if ($this->input->post('search')){
				 $search = $this->input->post("search")["value"];
				}

			$order_column = NULL;
			$order_dir = NULL;
			$order = $this->input->post("order");
			if (isset($order)){
				$order_column = $order[0]["column"];
				$order_dir = $order[0]["dir"];
			}

			$this->db->from("services");
			if (isset($search)){
				$first = TRUE;
				foreach ($this->column_search as $field) {
					if ($first){
						$this->db->group_start();
						$this->db->like($field, $search);
						$first = FALSE;
					} else {
						$this->db->or_like($field, $search);
					}
				}
				if (!$first){
					$this->db->group_end();
				}
			}
				if (isset($order)){
					$this->db->order_by($this->column_order[$order_column], $order_dir);
				}
		}
			public function get_datatable(){
				$length = $this->input->post("length");
				$start = $this->input->post("start");
				$this->_get_datatable();
				if (isset($length) && $length != -1){
					$this->db->limit($length, $start);
				}
				return $this->db->get()->result();
			}

			public function records_filtered(){
				$this->_get_datatable();
				return $this->db->get()->num_rows();
			}

			public function records_total(){
				$this->db->from("services");
				return $this->db->count_all_results();
			}

}