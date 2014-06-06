<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <p>Een nieuw bedrijf heeft zich aangemeld, u kunt deze inschrijving bekijken via: <a href="{{ URL::to(dashboard/companies/edit/'. $company->id); }}">hier</a> om deze vervolgens te accepteren of afwijzen.</p>
    </body>
</html>