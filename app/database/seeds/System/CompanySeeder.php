<?php
/**
 * Wies Kueter
 * Date: 17/05/2014
 * Time: 14:34
 * Author: Wies Kueter
 */

namespace System;
use \Fairtrade\IpsumGenerator;
use \Model\Company;
use Image;
use File;

class CompanySeeder extends \Seeder
{
    public function run() {

        Company::truncate();

        $companies = [
            [
                "name" => "AH Food Plaza",
                "address" => "Nieuwezijds Voorburgwal 226",
                "city" => "Amsterdam",
                "postal_code" => "1012 RR",
                "category" => 3,
                "logo" => "EYgGsiTsuY33MmsoyCiE7sipgofTdi.png"
            ],
            [
                "name" => "AH Museumplein",
                "address" => "van Baerlestraat 33a",
                "city" => "Amsterdam",
                "postal_code" => "1071 AP",
                "category" => 3,
                "logo" => "EYgGsiTsuY33MmsoyCiE7sipgofTdi.png"
            ],
            [
                "name" => "AH XL",
                "address" => "Osdorperplein 469",
                "city" => "Amsterdam",
                "postal_code" => "1068 SZ",
                "category" => 3,
                "logo" => "EYgGsiTsuY33MmsoyCiE7sipgofTdi.png"
            ],
            [
                "name" => "Amsterdam Cupcake Company",
                "address" => "Marco Polostraat 209",
                "city" => "Amsterdam",
                "postal_code" => "1057 WK",
                "category" => 4,
                "logo" => "EYgGsiTsuY33MmsoyCiE7sipgofTdi.png"
            ],
            [
                "name" => "Deen Supermarkt",
                "address" => "Rijnstraat 152",
                "city" => "Amsterdam",
                "postal_code" => "1079 HP",
                "category" => 3,
                "logo" => "deen.jpg"
            ],
            [
                "name" => "Deen Supermarkt",
                "address" => "Nierstraat 16",
                "city" => "Amsterdam",
                "postal_code" => "1078 VK",
                "category" => 3,
                "logo" => "deen.jpg"
            ],
            [
                "name" => "Deen Supermarkt",
                "address" => "Rietwijkerstraat 42-44",
                "city" => "Amsterdam",
                "postal_code" => "1059 XB",
                "category" => 3,
                "logo" => "deen.jpg"
            ],
            [
                "name" => "Frank@Fair",
                "address" => "Czaar Peterstraat 68",
                "city" => "Amsterdam",
                "postal_code" => "1018 PR",
                "category" => 2,
                "logo" => "frankfair.jpg"
            ],
            [
                "name" => "Gall & Gall",
                "address" => "Buitenvelderstelaan 176",
                "city" => "Amsterdam",
                "postal_code" => "1081 AC",
                "category" => 3,
                "logo" => "gallgall.jpg"
            ],
            [
                "name" => "Jumbo",
                "address" => "Buitenvelderstelaan 184",
                "city" => "Amsterdam",
                "postal_code" => "1081 AC",
                "category" => 3,
                "logo" => "jumbo.gif"
            ],
            [
                "name" => "Marqt Overtoom",
                "address" => "Overtoom 21",
                "city" => "Amsterdam",
                "postal_code" => "1054 HC",
                "category" => 3,
                "logo" => "marqt.jpg"
            ],
            [
                "name" => "Milagros Mundo",
                "address" => "Postjesweg 23",
                "city" => "Amsterdam",
                "postal_code" => "1057 DV",
                "category" => 2,
                "logo" => "milagros.png"
            ],
            [
                "name" => "Nukuhiva",
                "address" => "Haarlemmerstraat 36",
                "city" => "Amsterdam",
                "postal_code" => "1013 ES",
                "category" => 1,
                "logo" => "nukuhiva.jpg",
                "description" => "<p>Fair Fashion, Hip, stijlvol en duurzaam, dat is waar Nukuhiva voor staat. Wij kiezen bewust voor fair trade en modelabels die produceren met respect voor mens en natuur. De door ons geselecteerde  fair trade merken maken hun kleding en accessoires met duurzaamheid als belangrijke richtlijn.  Bijvoorbeeld door gebruik te maken van biologisch katoen of andere natuurvriendelijke materialen. En daarmee staat die jeans niet alleen goed, het voelt ook goed.</p>

                <p>Vooruitstrevend en Eigenwijs
                Veel vooruitstrevende en innovatieve modelabels en ontwerpers kiezen voor duurzaam. Zo vind je bij Nukuhiva stoere tassen gemaakt van oude bootzeilen of jassen gemaakt van gerecyclede petflessen. Hip en duurzaam gaan bij Nukuhiva hand in hand. De kledingcollectie loopt uiteen van sportief en stoer tot chique en vrouwelijk. Daarnaast verkoopt Nukuhiva accessoires en bijzondere lifestyle items.</p>",
                "business_hours" => "
                Maandag	12:00 – 19:00 <br />
                Dinsdag	10:30 – 19:00 <br />
                Woensdag	10:30 – 19:00 <br />
                Donderdag	10:30 – 19:00 <br />
                Vrijdag	10:30 – 19:00 <br />
                Zaterdag	10:00 – 18:00 <br />
                Zondag	12:00 – 18:00",
                "url" => "http://nukuhiva.nl/"
            ],
            [
                "name" => "Plus supermarkt",
                "description" => "<p>PLUS Retail is, met 265 supermarktondernemers die de PLUS formule voeren, een belangrijke speler op de Nederlandse levensmiddelenmarkt. Deze organisatie van zelfstandige supermarktondernemers onderscheidt zich door haar coöperatieve structuur. </p>

                <p>Bij PLUS staan de volgende merkwaarden centraal: Aandacht, Kwaliteit, Lokaal en Verantwoord. De pay-off van PLUS luidt \"PLUS geeft meer.\"</p>

                <p>...meer aandacht:
                De mensen op de winkelvloer zijn een van de plussen van PLUS. U krijgt van hen meer aandacht dan waar ook. Ze helpen u boodschappen doen, geen vraag is ze te veel, geen moeite te groot. Zoals het hoort dus.</p>

                <p>...meer kwaliteit:
                Alleen van aandacht kunt u niet leven. Daarom zijn de prijzen een andere plus van PLUS. Elke dag weer krijgt u voordeel met de scherpste aanbiedingen en unieke PLUS acties. </p>

                <p>...meer lokaal:
                Bij PLUS halen we, als het maar even kan, de versproducten uit de buurt, waardoor we de schakel tussen teler en u zo kort mogelijk houden. Daarom vindt u bij PLUS meer verse en lekkere producten. </p>

                <p>...meer verantwoord:
                PLUS heeft het grootste assortiment biologische producten, verkoopt alleen Fairtrade bananen en streeft ernaar dat de vis die verkocht wordt, zo veel mogelijk duurzaam gevangen of gekweekt is. </p>

                <p>Elke PLUS wordt geleid door een zelfstandig ondernemer, die baas is in zijn eigen winkel en vrij is om op de wens van de klant in te spelen. Bij PLUS staat u, de klant, dus echt centraal.</p>",
                "url" => "http://www.plus.nl",
                "business_hours" => "Maandag	26 mei	 08:00 - 20:00 <br />
                Dinsdag	27 mei	 08:00 - 20:00 <br />
                Woensdag	21 mei	 08:00 - 20:00 <br />
                Donderdag	22 mei	 08:00 - 20:00 <br />
                Vrijdag	23 mei	 08:00 - 20:00 <br />
                Zaterdag	24 mei	 08:00 - 20:00 <br />
                Zondag	25 mei	 10:00 - 18:00 <br /> ",
                "address" => "Bezaanjachtplein 291",
                "city" => "Amsterdam",
                "postal_code" => "1034 CR",
                "category" => 3,
                "logo" => "plus.png"
            ],
            [
                "name" => "Spar",
                "description" => "<p>Mijn buurt, mijn SPAR. De lekkere verswinkel voor dagelijks gemak in uw buurt! </p>
                <p>Mission
                De beste winkel voor de buurt!
                SPAR wil met zijn ondernemers zorgen dat boodschappen doen dicht bij huis de leefbaarheid van dorpen en buurten versterkt en daardoor bijdraagt aan de kwaliteit van leven.</p>
                <p>Description
                De basis van de hele SPAR organisatie in Nederland wordt gevormd door ruim 250 zelfstandige SPAR winkels en 115 Attent winkels. Al deze winkels worden beleverd vanuit twee distributiecentra (Waalwijk en Alkmaar).</p>

                <p>Zowel SPAR als Attent zijn echte buurtwinkels. SPAR is dan ook de buurtwinkelketen van Nederland!</p>",
                "url" => "http://www.spar.nl",
                "business_hours" => "Maandag	08:00 - 20:00 <br />
                Dinsdag	08:00 - 20:00 <br />
                Woensdag	08:00 - 20:00 <br />
                Donderdag	08:00 - 20:00 <br />
                Vrijdag	08:00 - 20:00 <br />
                Zaterdag	08:00 - 18:00 <br />
                Zondag	11:00 - 18:00",
                "address" => "Nieuwe Kerkstraat 65",
                "city" => "Amsterdam",
                "postal_code" => "1018 DZ",
                "category" => 3,
                "logo" => "spar.png"
            ],
            [
                "name" => "Spar de Winter",
                "description" => "<p>Mijn buurt, mijn SPAR. De lekkere verswinkel voor dagelijks gemak in uw buurt! </p>
                <p>Mission
                De beste winkel voor de buurt!
                SPAR wil met zijn ondernemers zorgen dat boodschappen doen dicht bij huis de leefbaarheid van dorpen en buurten versterkt en daardoor bijdraagt aan de kwaliteit van leven.</p>
                <p>Description
                De basis van de hele SPAR organisatie in Nederland wordt gevormd door ruim 250 zelfstandige SPAR winkels en 115 Attent winkels. Al deze winkels worden beleverd vanuit twee distributiecentra (Waalwijk en Alkmaar).</p>

                <p>Zowel SPAR als Attent zijn echte buurtwinkels. SPAR is dan ook de buurtwinkelketen van Nederland!</p>",
                "url" => "http://www.spar.nl",
                "business_hours" => "Maandag	08:00 - 20:00 <br />
                Dinsdag	08:00 - 20:00 <br />
                Woensdag	08:00 - 20:00 <br />
                Donderdag	08:00 - 20:00 <br />
                Vrijdag	08:00 - 20:00 <br />
                Zaterdag	08:00 - 20:00 <br />
                Zondag	11:00 - 18:00",
                "address" => "Osdorperban 116-122",
                "city" => "Amsterdam",
                "postal_code" => "1068 MK",
                "category" => 3,
                "logo" => "spar.png"
            ],
            [
                "name" => "Spar Steur",
                "description" => "<p>Mijn buurt, mijn SPAR. De lekkere verswinkel voor dagelijks gemak in uw buurt! </p>
                <p>Mission
                De beste winkel voor de buurt!
                SPAR wil met zijn ondernemers zorgen dat boodschappen doen dicht bij huis de leefbaarheid van dorpen en buurten versterkt en daardoor bijdraagt aan de kwaliteit van leven.</p>
                <p>Description
                De basis van de hele SPAR organisatie in Nederland wordt gevormd door ruim 250 zelfstandige SPAR winkels en 115 Attent winkels. Al deze winkels worden beleverd vanuit twee distributiecentra (Waalwijk en Alkmaar).</p>

                <p>Zowel SPAR als Attent zijn echte buurtwinkels. SPAR is dan ook de buurtwinkelketen van Nederland!</p>",
                "url" => "http://www.spar.nl",
                "business_hours" => "Maandag	08:00 - 20:00 <br />
                Dinsdag	08:00 - 20:00 <br />
                Woensdag	08:00 - 20:00 <br />
                Donderdag	08:00 - 20:00 <br />
                Vrijdag	08:00 - 20:00 <br />
                Zaterdag	08:00 - 19:00 <br />
                Zondag	12:00 - 19:00",
                "address" => "Spaarndammerstraat 544",
                "city" => "Amsterdam",
                "postal_code" => "1013 TH",
                "category" => 3,
                "logo" => "spar.png"
            ],
            [
                "name" => "Tony Chocolonely",
                "description" => "<p>We werken elke dag heel hard om de chocoladewereld 100% slaafvrij te maken. Alles wat we doen, doen we vanuit onze missie. Die bestaat uit drie delen.</p>

                <p>Crazy about chocolate
                Wij zijn gek op chocolade. We willen de allerlekkerste chocolade maken van de beste verse cacao, zonder nare bijsmaak. Wij zien cacao niet als commodity van de world stock market. Daarvoor houden we er simpelweg te veel van.
                Daarom kopen we onze cacao rechtstreeks in bij boeren in Ghana en Ivoorkust waar we een langetermijn-relatie mee hebben. Een belangrijke stap richting 100% slaafvrije chocolade.
                Verder kopen we onze ingrediënten waar mogelijk Fairtrade-gecertificeerd in. Maar liever gaan we nog een stukje verder. Zoals de biologische melk van Nederlandse koeien waar wij onze chocolademelk van maken bijvoorbeeld.</p>
                <p>Serious about people
                We zijn behoorlijk serieus als het om mensen gaat. Maar we nemen onszelf vooral niet te serieus.boer-en-reepAls het op cacaoboeren aankomt is het voor ons wel menens: we zullen niet rusten voordat iedereen in de chocoladewereld krijgt waar hij recht op heeft.Zo zijn we bijvoorbeeld ons Bean to Bar project gestart waar een directe handelsrelatie met cacaoboeren centraal staat. Net zo serieus zijn we als het om onze fans, klanten en leveranciers gaat.</p>
                <p>Raising the bar
                Wij zijn vastbesloten om chocolade te veranderen. Wij willen laten zien dat het ook anders kan door het goede voorbeeld te geven. We hopen hiermee andere (grotere) chocolademakers en verkopers te inspireren ook hun verantwoordelijkheid te nemen. Alleen zo kunnen we de ongelijk verdeelde chocoladewereld veranderen in een 100% slaafvrije.</p>",
                "url" => "http://www.tonyschocolonely.com/",
                "business_hours" => "Webshop",
                "address" => "Polonceaukade 12",
                "city" => "Amsterdam",
                "postal_code" => "1014 DA",
                "category" => 4,
                "logo" => "chocolonely.jpeg"
            ],
            [
                "name" => "Waarwinkel",
                "address" => "Bilderdijkstraat 57",
                "description" => "WAAR is dé cadeauwinkel voor bijzondere duurzame producten. De productgroepen die WAAR voert variëren van woonaccessoires en sieraden tot food en boeken. Het brede assortiment bestaat naast fairtrade producten ook uit biologische, ecologische en gerecyclede artikelen met bijzonder design.",
                "url" => "http://www.ditiswaar.nl/",
                "business_hours" => "Maandag: 12.00 – 18.00 <br />
                Di, wo, vrij: 10.00 – 18.00 <br />
                Donderdag: 10.00 – 21.00 <br />
                Zaterdag: 10.00 – 17.00 <br />
                Koopzondag: 12.00 – 17.00",
                "city" => "Amsterdam",
                "postal_code" => "1053 KM",
                "category" => 2,
                "logo" => "waarwinkel.jpg"
            ],
            [
                "name" => "Wereldwinkel ABAL",
                "description" => "<p>Wereldwinkel Amsterdam ABAL verkoopt originele, eigentijdse fairtrade cadeaus zoals woonaccessoires, sieraden, tassen, speelgoed, en (h)eerlijke levensmiddelen uit andere culturen. Onze producten zijn gemaakt met respect voor mens en milieu.</p>

                <p>Met de verkoop van fairtrade producten investeert de Wereldwinkel in een leefbare wereld voor iedereen. Elk product uit het assortiment is met zorg en volgens de fairtrade criteria geproduceerd en ingekocht. Ondernemers in ontwikkelingslanden krijgen op deze manier toegang tot de Europese markt en daarmee de kans een beter bestaan op te bouwen.<p>
                <p>De 7.000 vrijwilligers in bijna 240 Wereldwinkels maken hiermee duidelijk dat het in de wereld ook anders kan. Dat armoede wél bestreden kan worden. Koop je een cadeau in één van deze winkels, dan draag je daaraan bij.</p>

                <p>Onze fairtrade cadeauwinkel in De Pijp wordt volledig gerund door vrijwilligers.</p>

                <p>Kom eens langs en laat je verrassen!!</p>",
                "url" => "http://www.amsterdam-abal.wereldwinkels.nl/",
                "address" => "Ceintuurbaan 266",
                "city" => "Amsterdam",
                "postal_code" => "1072 GJ",
                "category" => 2,
                "logo" => "wereldwinkel.png"
            ],
            [
                "name" => "Koninklijk Instituut voor de Tropen",
                "description" => "<p>Het KIT werkt aan duurzame ontwikkeling en armoedebestrijding door kennis te ontwikkelen en te delen over vier samenhangende thema's:
                <ul>
                    <li>duurzame economische ontwikkeling</li>
                    <li>gezondheid</li>
                    <li>cultuurbehoud en –uitwisseling</li>
                    <li>kennisoverdracht</li>
                </ul>
                </p>
                <p>In Nederland zet het KIT zich in om de interesse en steun voor deze thema's te vergroten. Het KIT ondersteunt bedrijven, cultuurinstellingen, ontwikkelingsorganisaties en overheden in binnen- en buitenland hun doelen te bereiken met hoogwaardige, bruikbare kennis.</p>",
                "business_hours" => "Dinsdag t/m zondag en feestdagen van 10.00-17.00 uur
                Tijdens feestdagen en schoolvakanties – behalve de zomervakantie – is het museum ook op maandag open: 10.00-17.00 ",
                "address" => "Mauritskade 63",
                "city" => "Amsterdam",
                "postal_code" => "1092 AD",
                "category" => 7,
                "logo" => "tropeninstituut.jpg"
            ],
            [
                "name" => "M”venpick Hotel Amsterdam City Centre",
                "description" => "<p>City Centre Hotel Amsterdam dicht bij Centraal Station.
                Het Mövenpick Hotel Amsterdam City Centre trakteert gasten van de 408 kamers op een spectaculair uitzicht over de stad en het IJ op een unieke locatie. Op loopafstand van het historische centrum van Amsterdam, Central Station en culturele hotspots.</p>

                <p>Het hotel is eenvoudig te bereiken vanaf de snelweg en is slechts 20 minuten van Schiphol Airport gelegen. Met 12 flexibele en ultramoderne vergaderzalen met natuurlijk daglicht en gratis internet biedt het hotel een perfecte balans tussen zaken en ontspanning.</p>

                <p>Trek voordeel van een van de talrijke hoteldeals van Mövenpick Hotel Amsterdam City Centre. Tot de laatste aanbiedingen behoren hoge kortingen en weekendjes weg in Amsterdam.</p>",
                "url" => "http://www.moevenpick-hotels.com/nl/europe/netherlands/amsterdam/hotel-amsterdam/overzicht/",
                "address" => "Piet Heinkade 11",
                "city" => "Amsterdam",
                "postal_code" => "1019 BR",
                "category" => 5,
                "logo" => "Movenpick.jpg"
            ],
            [
                "name" => "St. Ignatiusgymnasium",
                "description" => "ROC TOP biedt jongeren uitdagend kleinschalig mbo-onderwijs dat je goed voorbereidt op het bedrijfsleven of een vervolgstudie. ROC TOP onderscheidt zich door de persoonlijke aandacht die aan studenten wordt gegeven. De organisatie heeft in totaal elf locaties in Amsterdam en Almere waar ruim 5.000 studenten deelnemen aan zestig verschillende opleidingen. In totaal werken zo’n 400 medewerkers bij de organisatie.",
                "url" => "http://www.roctop.nl/amsterdam/locaties/de-klencke",
                "address" => "De Klencke 4",
                "city" => "Amsterdam",
                "postal_code" => "1083 HH",
                "category" => 8,
                "logo" => "ignatiusgymnasium.jpg"
            ],
            [
                "name" => "Rije Universiteit Amsterdam",
                "description" => "VU is verder kijken
                <p>Al sinds de oprichting in 1880 staat de VU voor een onderscheidende manier van wetenschap toepassen. De VU is een open organisatie, die sterk verbonden is met mens en maatschappij. Het gaat niet alleen om verdieping van kennis, maar ook om verbreding. We vragen van onze studenten, onderzoekers, promovendi en medewerkers dat ze verder kijken: verder dan het eigenbelang, het eigen vakgebied, verder dan het bekende, verder dan het hier en nu.</p>",
                "address" => "De Boelelaan 1105",
                "city" => "Amsterdam",
                "postal_code" => "1081 HV",
                "category" => 8,
                "logo" => "VUTTO.png"
            ],
        ];



       foreach($companies as $company){
           $modelCompany = new Company;
           $modelCompany->accepted = 1;

           foreach($company as $column => $value){
                $modelCompany->$column = $value;

               if($column === 'logo'){
                   $img = Image::make( public_path().'/images/logos/'.$value )
                    // Save full size
                     ->save( public_path().'/uploads/logos/'.$value);
                   // Create thumbnail

                   $thumbnail_path =  public_path().'/uploads/logos/t/';
                   if( !File::isDirectory($thumbnail_path)){
                       File::makeDirectory($thumbnail_path);
                   }

                   $img->resize(150, 150, true)
                        ->save($thumbnail_path.$value);
               }
           }


           $modelCompany->save();
       }
    }
}