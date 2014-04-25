<?php
/**
 * JARIZ.PRO
 * Date: 22/04/2014
 * Time: 15:22
 * Author: JariZ
 */
namespace Fairtrade;
class IpsumGenerator {
    static $words = null;
    /**
     * Generate a dummy text paragraphs (for seeding)
     * @param int $amount Amount of paragraphs to generate
     * @param null $wordsPerParagraph Amounts of words within each paragraph. If passed null, will be changed in a random value from 7 till 25
     * @param bool $ptags Add paragraph tags.
     * @return string
     * @author Jari Zwarts
     */
    public static function generateParagraphs($amount=4, $wordsPerParagraph=null, $ptags=true) {
        self::initWords();
        $string = "";

        for ($i = 1; $i <= $amount; $i++) {
            $firstword = true;
            if(is_null($wordsPerParagraph)) $wordsPerParagraph = mt_rand(7,25);
            if($ptags) $paragraph = "<p>";
            else $paragraph = "";
            for ($x = 1; $x <= $wordsPerParagraph; $x++) {
                //pick random word
                $word = self::getWord($firstword);

                if($firstword) $firstword = false;

                $paragraph .= $word." ";
            }

            //cut off last space and add end tag if necessary
            $string .= substr($paragraph, 0, strlen($paragraph)-1);
            if($ptags) $string .= "</p>";
        }

        return $string;
    }

    /**
     * Returns a random lorem ipsum dummy word.
     * @author Jari Zwarts
     */
    public static function getWord($capitalize=false) {
        self::initWords();
        $word = self::$words[mt_rand(0, count(self::$words)-1)];
        if($capitalize) $word = strtoupper(substr($word, 0, 1)).substr($word, 1, strlen($word));
        return $word;
    }

    static function initWords() {
        if(is_null(self::$words)) self::$words = \Config::get("seeding.words");
    }
} 