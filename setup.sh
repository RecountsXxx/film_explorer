cp ./project/src/.env.example ./project/src/.env
cp .env.example .env

docker-compose up -d --build
cd ./project/src/
npm install
npm run dev
docker-compose exec project.php php artisan migrate

echo "Install his completed!"