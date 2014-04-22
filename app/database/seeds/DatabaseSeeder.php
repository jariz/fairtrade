<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call("UserSeeder");
        $this->call("NewsSeeder");
        $this->call("CompanySeeder");
        $this->call("EventSeeder");
        $this->call("ConceptSeeder");
        $this->call("PageSeeder");
	}

}
