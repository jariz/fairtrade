<?php

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $answer = $this->command->ask("Wil je daar ook testing data bij? Ja/Nee ", false);
        $testing = strtolower($answer) == "ja";

        $this->call("\\System\\CompanySeeder");
        $this->call("\\System\\SpecialPagesSeeder");
        $this->call("\\System\\RoleSeeder");
        if ($testing) {
            $this->call("\\Testing\\CategorySeeder");
            $this->call("\\Testing\\UserSeeder");
            $this->call("\\Testing\\NewsSeeder");
            $this->call("\\Testing\\EventSeeder");
            $this->call("\\Testing\\ConceptSeeder");
            $this->call("\\Testing\\PageSeeder");
        }
    }

}
