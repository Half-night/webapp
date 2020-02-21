<?php

class HomepageModel extends Model
{

	public function get() {

		$data = array(
			'title' => 'Title',
			'description' => 'Description',
			'keywords' => 'Keywords',
			'robots' => 'All',
			'some_data' => 'Some data',
		);

		return $data;
	}
}