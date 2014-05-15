# Project Documentatie

## Composer

Voordat je wat kan doen, moeten alle dependencies worden gedownload met composer via de command line:

```
composer update
```

## Database Configuratie

Standaard mist het configuratie bestand voor de database, de template hiervan staat in:

```
app/config/default/database.php
```

De content hiervan moet gekopieërd worden naar een nieuw bestand

```
app/config/database.php
```


In het nieuwe bestand moet de configuratie worden aangepast naar wat voor jouw machine van toepassing is. De configuratie staat op lijn 55-64:

```php
        'mysql' => array(
            'driver'    => 'mysql',
            'host'      => 'localhost',  /* <--- Jouw host hier */
            'database'  => 'database',  /* <--- Jouw Database naam hier */
            'username'  => 'root',  /* <--- Jouw gebruikersnaam hier */
            'password'  => '',  /* <--- Jouw wachtwoord hier */
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ),

```

## Migration & Seeders

Nadat de configuratie voor de database is gedaan, kan de volgende command worden uitgevoerd in de Root van het project, om alle tabellen aan te maken en test data toe te voegen:

```
php artisan migrate --seed
```

Alleen migrations

```
php artisan migrate
```

Alleen seeders

```
php artisan db:seed
```

## Autocompletion  

Eventueel als je een IDE met autocompletion heb en hier gebruik van wilt maken, draai:

```
php artisan ide-helper:generate
php artisan ide-helper:models
```


## Assets

### Javascript bestanden

Alle Javascript bestanden die horen bij de core worden opgeslagen in:

```
public/js
```
### Stylesheets

Alle Stylesheets die horen bij de core worden opgeslagen in:

```
public/css
```

### Images

Alle images die horen bij de template van de website worden opgeslagen in:

```
public/images
```


### Uploads

Alle images die de gebruikers uploaden worden opgeslagen in: 

```
public/uploads
```

Elk type plaatje heeft zijn eigen sub directory:

**Nieuws berichten plaatjes**

```
public/uploads/news
```

**Concepten artikel plaatjes**

```
public/uploads/concepts
```


**Bedrijven logo's**

```
public/uploads/logos
```


### Plugins
Front-end plugins zoals jQuery worden opgelsagen in:

```
public/plugins/{plugin_name}
```



## Controllers


Alle Controllers voor de normale pagina's zijn te vinden in:

```
app/controllers/Front
```


Alle Controllers voor de admin pagina's zijn te vinden in:

```
app/controllers/Admin
```

## Namespaces

### Fairtrade

Onder deze namespace worden classes opgeslagen die bepaalde complexe logica hebben, die (vaak) wordt hergebruikt, zoals bijvoorbeel de **Upload** class

De bestanden worden opgeslagen in:

```
app/lib/Fairtrade
```

### Front

Deze namespace wordt gebruikt voor alle controllers van front-end pagina's

De bestanden worden opgeslagen in:

```
app/controllers/Front
```


### Admin

Deze namespace wordt gebruikt voor alle controllers van admin pagina's

De bestanden worden opgeslagen in:

```
app/controllers/Admin
```


### Model

Deze namespace wordt gebruikt voor alle models

De bestanden worden opgeslagen in:

```
app/models/Model
```


## Views

### Front
Alle front-end pagina's worden opgeslagen in:
```
app/views/front
```

### Admin
Alle admin pagina's worden opgeslagen in:
```
app/views/admin
```

Alle pagina's die te maken hebben het met het CRUD systeem in:
```
app/views/admin/crud
```

### Includes
Alle veel gebruikte views worden opgeslagen in:
```
app/views/includes
```

### Speciale pagina's
"Speciale pagina's" (pagina's die hun eigen views hebben in plaats van de standaard dynamische) bevinden zich in:
```
app/views/front/special
```

### Template systeem
Er kan snel tussen template gewisseld worden met gebruik van het template systeem.
Alle templates bevinden zich in:

```
app/front/views/templates
```

De template die het systeem gebruikt kan worden verandert in fairtrade.php in de config map.