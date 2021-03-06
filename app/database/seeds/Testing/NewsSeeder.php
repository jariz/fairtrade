<?php
/**
 * JARIZ.PRO
 * Date: 22/04/2014
 * Time: 14:51
 * Author: JariZ
 */
namespace Testing;
use \Model\Post;
use \Fairtrade\IpsumGenerator;
class NewsSeeder extends \Seeder {
    public function run() {

        Post::truncate();

        for ($i = 1; $i <= \Config::get("seeding.amount"); $i++)
            Post::create(array(
                "title" => IpsumGenerator::generateParagraphs(1, mt_rand(3,7), false),
                "content" => IpsumGenerator::generateParagraphs(),
                "image" => "",
                "published" => mt_rand(0, 1),
            ));
    }
} 