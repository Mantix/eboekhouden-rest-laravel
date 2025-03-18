# Projectstructuur Laravel Package

Hier is de volledige projectstructuur voor de Laravel integratie van de e-Boekhouden REST API:

```
eboekhouden-rest-laravel/
├── config/
│   └── eboekhouden.php             # Configuratiebestand
├── src/
│   ├── EBoekhoudenServiceProvider.php   # Service provider voor Laravel
│   └── Facades/
│       └── EBoekhouden.php         # Laravel Facade
├── tests/
│   ├── Feature/
│   │   └── EBoekhoudenTest.php     # Feature tests
│   ├── Unit/
│   │   └── ... (toekomstige unit tests)
│   └── TestCase.php                # Base TestCase klasse
├── .gitignore
├── LICENSE
├── composer.json
├── phpunit.xml
└── README.md
```

## Installatie-instructies voor Windows

1. Maak een nieuw project aan:

```
md eboekhouden-rest-laravel
cd eboekhouden-rest-laravel
```

2. Initialiseer Git:

```
git init
```

3. Maak de projectstructuur aan:

```
md config
md src
md src\Facades
md tests
md tests\Feature
md tests\Unit
```

4. Maak een `.gitignore` bestand aan:
   - Open Notepad (of een andere teksteditor)
   - Maak een nieuw bestand
   - Voeg de onderstaande inhoud toe
   - Sla het op als `.gitignore` in de hoofdmap van je project
   - Zorg dat je "Alle bestanden" selecteert als bestandstype, niet "Tekstdocument"

```
/vendor/
/composer.lock
/.phpunit.result.cache
/.phpunit.cache/
/.idea/
/.vscode/
/node_modules/
```

5. Kopieer de eerder aangemaakt bestanden naar de juiste mappen:
   - `eboekhouden.php` naar `config/`
   - `EBoekhoudenServiceProvider.php` naar `src/`
   - `EBoekhouden.php` naar `src/Facades/`
   - `EBoekhoudenTest.php` naar `tests/Feature/`
   - `TestCase.php` naar `tests/`
   - `composer.json`, `phpunit.xml`, `LICENSE` en `README.md` naar de hoofdmap

6. Installeer Composer als je dat nog niet hebt gedaan:
   - Download de Composer installer van https://getcomposer.org/download/
   - Voer de installer uit en volg de instructies
   - Controleer de installatie door `composer --version` in een command prompt te typen

7. Installeer de afhankelijkheden:

```
composer install
```

8. Commit de bestanden:

```
git add .
git commit -m "Initial commit"
```

9. (Optioneel) Publiceer op Github of andere Git hosting service:
    - Maak een repository aan op GitHub
    - Voer de volgende commando's uit:

```
git remote add origin https://github.com/mantix/eboekhouden-rest-laravel.git
git push -u origin main
```

10. (Optioneel) Publiceer op Packagist om het via Composer beschikbaar te maken:
    - Maak een account aan op Packagist.org
    - Voeg je Github repository toe
    - Publiceer je package

## Gebruik in een Laravel project

Om dit package in een Laravel project te gebruiken, installeer je het via Composer:

```
composer require mantix/eboekhouden-rest-laravel
```

Stel vervolgens je API token in in je `.env` bestand:

```
EBOEKHOUDEN_API_TOKEN=jouw_api_token
EBOEKHOUDEN_SOURCE=JouwApp
```

Optioneel kun je het configuratiebestand publiceren als je meer instellingen wilt aanpassen:

```
php artisan vendor:publish --tag=eboekhouden-config
```

Nu kun je de e-Boekhouden API gebruiken via de Facade:

```php
use Mantix\EBoekhoudenRestLaravel\Facades\EBoekhouden;

$relations = EBoekhouden::getRelations();
```

Of via dependency injection:

```php
use Mantix\EBoekhoudenRestApi\Client;

public function index(Client $eboekhouden)
{
    $relations = $eboekhouden->getRelations();
    // ...
}
```