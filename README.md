Техническое задание на проверку, просмотр фильмов. Весь функционал описаный в тз работает. 
Я сделал всё в Dockere.
Я пытался сделать чистые контроллеры запихав всю логику в сервисе а в сервисе уже делал это, для работы с моделями я использовал репозиторий, загрузку фоток сделал на локальное хранилище мог бы на minio или s3 но смысла особого нету, также мог сделать загрузку фотографий через очереди в redis но тоже нету смысла, на больших проектах да а здесь нет

## Deployment
- **Start script "setup.sh" command:** Run `/bin/bash/setup.sh` and wait for the initial setup.
- **Other** `php artisan migrate`, `php artisan storage:link`
- **For other runs, enter the command:** `docker-compose up -d` and `npm run dev` to start the services.
