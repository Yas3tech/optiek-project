# Opticalium - Optiek Webapplicatie

Een complete webapplicatie voor een optieker, gebouwd met Laravel 12 en Tailwind CSS. De applicatie biedt functionaliteiten voor klanten om afspraken te maken, brillen te bekijken en contact op te nemen, evenals een uitgebreide admin interface voor het beheren van de website.

## Features

### Voor Klanten
- **Afspraken maken** - Plan een oogtest of andere afspraak
- **Brillen catalogus** - Bekijk de collectie met filters op tags
- **Nieuws** - Lees het laatste nieuws promo's of nieuwsartikelen
- **FAQ** - Veelgestelde vragen per categorie
- **Contact** - Stuur berichten en bekijk antwoorden
- **Dashboard** - Persoonlijk overzicht met afspraken status

### Voor Admins
- **Dashboard** - Overzicht met statistieken, wachtende afspraken en ongelezen berichten
- **Afspraken beheer** - Goedkeuren/afwijzen van afspraken
- **Brillen beheer** - CRUD voor brillen met afbeeldingen en tags
- **Nieuws beheer** - Publiceer en bewerk nieuwsartikelen
- **FAQ beheer** - Beheer categorieën en vragen
- **Berichten beheer** - Bekijk en beantwoord contactberichten
- **Gebruikers beheer** - Beheer gebruikers en admin rechten

## Vereisten

- PHP 8.2 of hoger
- Composer
- Node.js 18+ en npm
- SQLite (standaard) of MySQL/PostgreSQL

## Installatie

### 1. Clone de repository

```bash
git clone <repository-url>
cd optiek-project
```

### 2. Installeer dependencies

```bash
composer install
npm install
```

### 3. Configureer de omgeving

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database setup

```bash
# Maak de SQLite database aan
touch database/database.sqlite

# Voer de migraties uit
php artisan migrate

# Seed de database met testdata
php artisan db:seed
```

### 5. Storage link

```bash
php artisan storage:link
```

### 6. Build assets

```bash
npm run build
```

## Development

Start de development server met alle services:

```bash
composer dev
```

Dit start:
- Laravel development server (http://localhost:8000)
- Vite HMR server
- Queue worker
- Log viewer (Pail)

Of start de services afzonderlijk:

```bash
# Alleen Laravel server
php artisan serve

# Alleen Vite
npm run dev
```

## Test Accounts

Na het seeden zijn de volgende accounts beschikbaar:

| Email | Wachtwoord | Rol |
|-------|------------|-----|
| admin@ehb.be | Password!321 | Admin |
| test@ehb.be | Password!321 | Klant |

## Project Structuur

```
optiek-project/
├── app/
│   ├── Http/
│   │   ├── Controllers/        # Alle controllers
│   │   ├── Middleware/         # Admin middleware
│   │   └── Requests/           # Form request validatie
│   └── Models/                 # Eloquent models
├── database/
│   ├── migrations/             # Database migraties
│   └── seeders/                # Database seeders
├── resources/
│   └── views/
│       ├── admin/              # Admin views
│       ├── appointments/       # Afspraken views
│       ├── glasses/            # Brillen views
│       ├── news/               # Nieuws views
│       └── layouts/            # Layout templates
├── routes/
│   ├── web.php                 # Publieke routes
│   ├── admin.php               # Admin routes
│   └── auth.php                # Authenticatie routes
└── storage/
    └── app/public/             # Uploads (brillen, nieuws afbeeldingen)
```

## Database Models

| Model | Beschrijving |
|-------|-------------|
| User | Gebruikers met admin flag |
| Appointment | Afspraken met status (pending/approved/rejected) |
| Glass | Brillen met afbeelding, prijs, voorraad |
| Tag | Tags voor brillen filtering |
| News | Nieuwsartikelen |
| FaqCategory | FAQ categorieën |
| Faq | FAQ vragen en antwoorden |
| ContactMessage | Contactberichten met antwoorden |

## Routes Overzicht

### Publieke Routes
- `GET /` - Homepage
- `GET /news` - Nieuws overzicht
- `GET /news/{news}` - Nieuws detail
- `GET /faq` - FAQ pagina
- `GET /contact` - Contact formulier

### Klant Routes (auth required)
- `GET /dashboard` - Klant dashboard
- `GET /glasses` - Brillen catalogus
- `GET /appointments` - Mijn afspraken
- `POST /appointments` - Nieuwe afspraak
- `GET /my-messages` - Mijn berichten

### Admin Routes (auth + admin required)
- `GET /admin/appointments` - Afspraken beheer
- `GET /admin/glasses` - Brillen beheer
- `GET /admin/news` - Nieuws beheer
- `GET /admin/faq` - FAQ beheer
- `GET /admin/contact` - Berichten beheer
- `GET /admin/users` - Gebruikers beheer

## Testing

```bash
# Run alle tests
composer test

# Of direct via artisan
php artisan test
```

## Security Features

- Laravel Breeze authenticatie
- CSRF bescherming op alle forms
- Admin middleware voor beveiligde routes
- Password hashing met bcrypt
- Form request validatie

## Packages

### Backend
- **Laravel 12** - PHP Framework
- **Laravel Breeze** - Authenticatie scaffolding
- **Intervention Image** - Afbeelding verwerking en resize

### Frontend
- **Tailwind CSS 3** - Utility-first CSS framework
- **Alpine.js** - Lightweight JavaScript framework
- **Vite** - Modern build tool

## Auteur

Yassine Eddouks - EhB
