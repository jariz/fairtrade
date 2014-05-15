<?php

return array(

    "contact_email" => 'example@email.com',

    "template" => "kelvin",

    "nav_classes" => array(
        "orange",
        "pink",
        "darkbrown",
        "green",
        "blue",
        "brown",
        "lightblue"
    ),

    "admin_nav" => array(
        "Gebruikers" => "dashboard.users",
        "Nieuws" => "dashboard.news",
        "Evenementen" => "dashboard.events",
        "Activiteiten" => "dashboard.concepts",
        "Pagina's" => "dashboard.pages",
        "Bedrijven" => "dashboard.companies",
        "Categorie&euml;n" => "dashboard.categories"
    ),

    "crud" => array(
        "users" => "\\Admin\\Users",
        "news" => "\\Admin\\News",
        "events" => "\\Admin\\Events",
        "concepts" => "\\Admin\\Concepts",
        "pages" => "\\Admin\\Pages",
        "companies" => "\\Admin\\Companies",
        "categories" => "\\Admin\\Categories"
    )
);