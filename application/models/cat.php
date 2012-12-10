<?php

	class Cat extends CI_Model {

		function __construct()
		{
			// Call the Model constructor
			parent::__construct();
		}

		function update($result) {
		
			$this->db->where('radio', $result['radio']); 
			$query = $this->db->get('cat');
			
			if ($query->num_rows() > 0)
			{
				// Update the record
				foreach ($query->result() as $row)
				{
					$radio_id = $row->id;
					
					$data = array(
					   'frequency' => $result['frequency'],
					   'mode' => $result['mode']
					);

					$this->db->where('id', $radio_id);
					$this->db->update('cat', $data); 
				}
			} else {
				// Add a new record
				
				$data = array(
				   'radio' => $result['radio'],
					'frequency' => $result['frequency'],
					'mode' => $result['mode']
				);

				$this->db->insert('cat', $data); 

			}
		}
		
		
		function cat_status($result) {
		
			$this->db->where('profile_name', $result['profile_name']); 
			$query = $this->db->get('cat');
			
			if ($query->num_rows() > 0)
			{
				// Update the record
				foreach ($query->result() as $row)
				{
					$radio_id = $row->id;
					
					$data = array(
					   'profile_name' => $result['profile_name'],
					   'profile_url' => $result['profile_url']
					);

					$this->db->where('id', $radio_id);
					$this->db->update('cat', $data); 
				}
			} else {
				// Add a new record
				$data = array(
					'profile_name' => $result['profile_name'],
					'profile_url' => $result['profile_url']
				);

				$this->db->insert('cat', $data); 

			}
		}
	
		function status() {
			//$this->db->where('radio', $result['radio']); 
			$query = $this->db->get('cat');
			
			return $query;
		}

		/* Return list of radios */
		function radios() {
			$this->db->select('id, radio');
			$query = $this->db->get('cat');
			
			return $query;
		}
		
		function delete($id) {
			$this->db->where('id', $id);
			$this->db->delete('cat'); 
			
			return true;
		}
		


	}
?>