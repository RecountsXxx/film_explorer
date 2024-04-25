cp ./project/src/.env.example ./project/src/.env
cp .env.example .env

docker-compose up -d --build

docker-compose exec project.php php artisan migrate
cd ./project/src
npm install
npm run dev


echo "Install his completed!"