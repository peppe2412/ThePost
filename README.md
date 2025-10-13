# ![Dasboard](screenshots/favicon.png) The Post
![Dashboard](screenshots/the-post.png)
The Post è un’applicazione web sviluppata con Laravel che permette agli utenti di scrivere e leggere articoli con un sistema di ruoli avanzato.
### 🎯 Funzionalità principali
#### 🖊️ Scrivere, modificare e pubblicare articoli.
#### 📚 Visualizzare tutti gli articoli pubblicati.
#### 🔑 Sistema di ruoli:
- Writer: crea articoli.

- Revisor: revisiona articoli prima della pubblicazione.

- Admin: gestisce utenti, articoli, categorie, tag e ruoli.
### 🛠️ Tecnologie:
- Backend: Laravel 12
- Frontend: Blade + Tailwind/Bootstrap
- Database: MySQL
### 🚀Per l'installazione del progetto
```bash
git clone https://github.com/tuo-username/the-post.git
cd the-post
composer install
npm install
npm run dev
cp .env.example .env
php artisan key:generate
php artisan migrate 
php artisan serve
```
### Comandi per pulire cache e configurazioni:
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```
