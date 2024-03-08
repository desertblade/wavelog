<?php

class Satellite_model extends CI_Model {

	function get_all_satellites() {
		$sql = "select satellite.id, satellite.name as satname, group_concat(distinct satellitemode.name separator ', ') as modename, satellite.exportname, satellite.orbit
		from satellite
		left outer join satellitemode on satellite.id = satellitemode.satelliteid
		group by satellite.name, satellite.exportname, satellite.orbit, satellite.id";

		return $this->db->query($sql)->result();
	}

	function delete($id) {
		// Clean ID
		$clean_id = $this->security->xss_clean($id);

		// Delete Mode
		$this->db->delete('satellite', array('id' => $clean_id));
	}

	function saveupdatedsatellite($id, $satellite) {
        $this->db->where('satellite.id', $id);

        $this->db->update('satellite', $satellite);

        return true;
	}

	function add() {
		$data = array(
			'name' 			=> xss_clean($this->input->post('name', true)),
			'exportname' 	=> xss_clean($this->input->post('exportname', true)),
			'orbit' 		=> xss_clean($this->input->post('orbit', true)),
		);

		$this->db->where('name', xss_clean($this->input->post('name', true)));
		$result = $this->db->get('satellite');

		if ($result->num_rows() == 0) {
		   $this->db->insert('satellite', $data);
		   $insert_id = $this->db->insert_id();

		   $data = array(
				'name' 				=> xss_clean($this->input->post('name', true)),
				'satelliteid' 		=> $insert_id,
				'uplinkmode'		=> xss_clean($this->input->post('uplinkmode', true)),
				'uplinkfrequency'	=> xss_clean($this->input->post('uplinkfrequency', true)),
				'downlinkmode'		=> xss_clean($this->input->post('downlinkmode', true)),
				'downlinkfrequency'	=> xss_clean($this->input->post('downlinkfrequency', true)),
			);

			$this->db->where('name', xss_clean($this->input->post('name', true)));
		}

	}

	function getsatellite($id) {
		$this->db->where('id', $id);
		return $this->db->get('satellite');
	}

	function getsatmodes($id) {
		$this->db->where('satelliteid', $id);
		return $this->db->get('satellitemode');
	}

}

?>
