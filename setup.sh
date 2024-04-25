cp ./project/src/.env.example ./project/src/.env
cp .env.example .env

docker-compose up -d --build

echo "Install his completed!"