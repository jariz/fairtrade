<!DOCTYPE html>
<html>
    <head></head>
    <body>
        Beste {{ $user->name }},

        <p>Bedankt voor het aanmelden van uw bedrijf.</p>
        <p>Wanneer wij uw bedrijf goedkeuren zal deze zichtbaar zijn op de website</p>
        <table>
            <tr>
                <td>Bedrijfsnaam</td>
                <td>{{ $company->name }}</td>
            </tr>
            <tr>
                <td>Adres:</td>
                <td>{{ $company->address }}</td>
            </tr>
            <tr>
                <td></td>
                <td>{{ $company->postal_code }}, {{ $company->city }}</td>
            </tr>
            <tr>
                <td>Beschrijving</td>
                <td>{{ $company->description }}</td>
            </tr>
            <tr>
                <td>Openingstijden</td>
                <td>{{ $company->business_hours }}</td>
            </tr>
            <tr>
                <td>Contactgegevens</td>
                <td>{{ $company->contact_info }}</td>
            </tr>
            <tr>
                <td>Categorie</td>
                <td>{{ $category }}</td>
            </tr>
        </table>
        <br />
        <p>Met vriendelijke groet,</p>

        <b>Team Fairtrade Amsterdam</b>
    </body>
</html>