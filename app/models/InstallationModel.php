<?php

class InstallationModel extends Model
{

	public function runDump() {

		$this->db->connect();

		$queries = file_get_contents(APP_DIR . '/install/create_tables.sql');
		$result = $this->db->multi_query($queries);

		$this->db->disconnect();
	}
}