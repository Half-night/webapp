<?php

class HomepageModel extends Model
{

	public function get() {

		//$this->db->connect();
		//$result = $this->db->query('SELECT 2 + 2 from DUAL');
		//$result = $this->db->query('INSERT INTO test (id) VALUES (6)');
		//$this->db->disconnect();

		//d($result);
		$data = array(
			'title' => 'Заголовок',
			'description' => 'Описание',
			'keywords' => 'Ключевые слова',
			'robots' => 'All',
			'some_data' => 'Что-нибудь еще',
		);

		return $data;
	}
}