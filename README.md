# e-Boekhouden REST API Laravel Integration

Laravel integratie voor de [e-Boekhouden.nl REST API](https://github.com/mantix/eboekhouden-rest-api).

## Installatie

Je kunt dit package installeren via Composer:

```bash
composer require mantix/eboekhouden-rest-laravel
```

## Laravel Compatibiliteit

Dit package ondersteunt Laravel versies 10, 11 en 12.

## Configuratie

Je kunt direct beginnen met alleen het instellen van je API token en source identifier in je `.env` bestand:

```
EBOEKHOUDEN_API_TOKEN=jouw_api_token
EBOEKHOUDEN_SOURCE=JouwApp
```

Optioneel kun je het configuratiebestand publiceren als je meer controle wilt over de instellingen:

```bash
php artisan vendor:publish --tag=eboekhouden-config
```

Dit maakt een `config/eboekhouden.php` bestand aan in je project dat je kunt aanpassen.

## Basis gebruik

Je kunt de e-Boekhouden REST API gebruiken via de `EBoekhouden` facade:

```php
use Mantix\EBoekhoudenRestLaravel\Facades\EBoekhouden;

// Relaties ophalen
$relations = EBoekhouden::getRelations();

// Een nieuwe relatie aanmaken
$newRelation = EBoekhouden::createRelation([
    'name' => 'Mijn nieuwe klant',
    'address' => 'Voorbeeldstraat 123',
    'postalCode' => '1234 AB',
    'city' => 'Amsterdam',
]);
```

## Dependency Injection

Je kunt ook dependency injection gebruiken:

```php
use Mantix\EBoekhoudenRestApi\Client;

class RelationController
{
    public function index(Client $eboekhouden)
    {
        return $eboekhouden->getRelations();
    }
}
```

## Filter Gebruik

De Filter class uit het basis package werkt ook hier:

```php
use Mantix\EBoekhoudenRestApi\Filter;
use Mantix\EBoekhoudenRestLaravel\Facades\EBoekhouden;

// Zoek relaties met "Bedrijf" in de naam
$relations = EBoekhouden::getRelations([
    'name' => Filter::like('%Bedrijf%'),
]);
```

## Sessie Beheer

Sessie beheer gebeurt automatisch. De client zal een sessie aanmaken wanneer nodig en deze hergebruiken voor volgende aanroepen. In een typische Laravel applicatie gaat dit achter de schermen. Je kunt wel expliciet de sessie beëindigen als je dat wilt:

```php
EBoekhouden::endSession();
```

## Foutafhandeling

Fouten van de API worden als `EBoekhoudenException` geworpen, die je kunt afhandelen met try/catch:

```php
use Mantix\EBoekhoudenRestApi\EBoekhoudenException;
use Mantix\EBoekhoudenRestLaravel\Facades\EBoekhouden;

try {
    $relations = EBoekhouden::getRelations();
} catch (EBoekhoudenException $e) {
    Log::error('e-Boekhouden API fout: ' . $e->getMessage());
    Log::error('API foutcode: ' . $e->getErrorCode());
    
    // Volledige foutrespons
    Log::debug($e->getErrorResponse());
}
```

## Beschikbare Methodes

Alle methodes van de onderliggende client zijn beschikbaar via de facade. Zie de [documentatie van mantix/eboekhouden-rest-api](https://github.com/mantix/eboekhouden-rest-api) voor een volledige lijst.

## Tests uitvoeren

```bash
composer test
```

## License

MIT