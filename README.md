# Project Documentatie

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