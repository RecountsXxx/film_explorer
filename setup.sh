cp ./project/src/.env.example ./project/src/.env
cp .env.example .env

docker-compose up -d --build
docker-compose restart
echo "Install his completed!"