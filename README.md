1. Clone the repository and cd into
```bash
git clone https://github.com/KRDevs/web_ilovalar_ishlab_chiqish.git && cd web_ilovalar_ishlab_chiqish
```
2. Install dependencies using composer
```bash
composer install
```
3. Copy the example env file and make the required configuration changes in the .env file
```bash
cp .env.example .env
```
4. Generate a new application key
```bash
php artisan key:generate
```
5. Run the database migrations and seed with dummy data
```bash
php artisan migrate --seed
```
6. Install node dependencies and generate front-end assets
```bash
npm install && npm run dev
```
7. Start the local development server
```bash
php artisan serve
```
