<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <p>Een nieuw bedrijf heeft zich aangemeld, u kunt deze inschrijving bekijken via: {{ link_to('dashboard/companies/edit', 'hier', array('id' => $company->id), $secure = null); }} om deze vervolgens te accepteren of afwijzen.</p>
    </body>
</html>