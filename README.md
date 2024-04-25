Техническое задание на проверку, просмотр фильмов. Весь функционал описаный в тз работает. 
Я сделал всё в Dockere.
Я пытался сделать чистые контроллеры запихав всю логику в сервисе а в сервисе уже делал это, для работы с моделями я использовал репозиторий, загрузку фоток сделал на локальное хранилище мог бы на minio или s3 но смысла особого нету, также мог сделать загрузку фотографий через очереди в redis но тоже нету смысла, на больших проектах да а здесь нет

## Deployment
- **Start script "setup.sh" command:** Run `/bin/bash/setup.sh` and wait for the initial setup.
- **Other** `php artisan migrate`, `php artisan storage:link`
- **For other runs, enter the command:** `docker-compose up -d` and `npm run dev` to start the services.
![Снимок экрана от 2024-04-25 18-44-06](https://github.com/RecountsXxx/film_explorer/assets/107986811/901fa6e2-0197-48b4-83de-5eb31e2da705)
![Снимок экрана от 2024-04-25 18-43-59](https://github.com/RecountsXxx/film_explorer/assets/107986811/a6a15b3a-d4d4-4b6f-a38f-69ad4626e3e9)
![Снимок экрана от 2024-04-25 18-43-54](https://github.com/RecountsXxx/film_explorer/assets/107986811/cee98125-85ec-451a-85b6-bbe6ecb97c11)
![Снимок экрана от 2024-04-25 18-43-47](https://github.com/RecountsXxx/film_explorer/assets/107986811/585fb027-7213-473a-8397-be8a06e355cc)
![Снимок экрана от 2024-04-25 18-43-37](https://github.com/RecountsXxx/film_explorer/assets/107986811/c3821c21-0d31-47d3-84a2-4bb3b955d2bb)
![image](https://github.com/RecountsXxx/film_explorer/assets/107986811/63cb4cec-4cd9-40af-9ba5-1daf22ea0fe9)

![Снимок экрана от 2024-04-25 18-43-30](https://github.com/RecountsXxx/film_explorer/assets/107986811/409a9835-0a6e-4444-a412-bb782fcc5826)
![Снимок экрана от 2024-04-25 18-43-22](https://github.com/RecountsXxx/film_explorer/assets/107986811/9daacf69-0455-4b27-8867-1e3205d0b4c7)
![Снимок экрана от 2024-04-25 18-43-11](https://github.com/RecountsXxx/film_explorer/assets/107986811/8a056105-e100-4000-b376-fd51fde94e90)
![Снимок экрана от 2024-04-25 18-43-05](https://github.com/RecountsXxx/film_explorer/assets/107986811/64923392-094a-4462-8150-b36552f21b68)
![Снимок экрана от 2024-04-25 18-43-01](https://github.com/RecountsXxx/film_explorer/assets/107986811/90043ed1-a221-411e-bfa1-d004e2d8c076)
![Снимок экрана от 2024-04-25 18-42-53](https://github.com/RecountsXxx/film_explorer/assets/107986811/2d86c89e-e0cf-4f67-a5dc-d8e0698f6507)
![Снимок экрана от 2024-04-25 18-42-46](https://github.com/RecountsXxx/film_explorer/assets/107986811/6bd0d779-1ae9-4d8b-bf68-badb5c190213)
![Снимок экрана от 2024-04-25 18-42-41](https://github.com/RecountsXxx/film_explorer/assets/107986811/6ad03509-2d3f-4eca-b99b-5a837a6d1852)
