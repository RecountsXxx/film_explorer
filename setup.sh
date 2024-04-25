cp ./project/src/.env.example ./project/src/.env
cp env.example .env

docker-compose up -d --build

npm i --prefix ./project/src

echo "Install his completed!"