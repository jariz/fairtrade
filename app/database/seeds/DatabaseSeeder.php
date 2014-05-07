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

        $answer = $this->command->choice("Wil je daar ook testing data bij?", ["Ja", "Nee"], "Nee");

        $this->call("\\System\\CompanySeeder");
        $this->call("\\System\\SpecialPagesSeeder");
        $this->call("\\System\\RoleSeeder");
        if($answer == 1) {
            $this->call("\\Testing\\UserSeeder");
            $this->call("\\Testing\\NewsSeeder");
            $this->call("\\Testing\\EventSeeder");
            $this->call("\\Testing\\ConceptSeeder");
            $this->call("\\Testing\\PageSeeder");
        }
	}

}
