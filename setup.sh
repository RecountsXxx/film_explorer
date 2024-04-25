cp ./back/api/src/.env.example ./back/api/src/.env
cp ./back/api_admin/src/.env.example ./back/api_admin/src/.env
cp ./back/api_vendor/src/.env.example ./back/api_vendor/src/.env

docker-compose up -d --build

npm i --prefix ./front/admin/src
npm i --prefix ./front/public/src
npm i --prefix ./front/vendor/src
npm i --prefix ./back/sockets/src

docker exec db.mysql.main mysql -h localhost -P 9090 -u root -ppassword -e "DROP DATABASE webshop;"
docker exec db.mysql.main mysql -h localhost -P 9090 -u root -ppassword -e "CREATE DATABASE IF NOT EXISTS webshop;"
docker exec -i db.mysql.main mysql -h localhost -P 9090 -u root -ppassword webshop < ./webshop.sql

docker-compose restart

echo "Install his completed!"