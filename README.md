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
#### 1°
```
git clone git@github.com:peppe2412/ThePost.git
cd the-post
composer install
```
#### 2°
```
npm install
npm run dev
```
#### 3°
```
cp .env.example .env
php artisan key:generate
php artisan migrate 
php artisan serve
```
#### Comandi per pulire cache e configurazioni (utili se sono state fatte modifiche al .env o per sviluppo e debudding):
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```
