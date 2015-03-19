#!/bin/bash
docker run -d -e RABBITMQ_NODENAME=my-rabbit --name some-rabbit -p 8080:15672 rabbitmq:3-management
docker run --name some-mysql -e MYSQL_ROOT_PASSWORD=root -d mysql
docker run -it --rm  php:5.6-cli php -r 'echo "hello world\n";'

docker run -it --rm --name my-running-script -v $(pwd):/usr/src/myapp -w /usr/src/myapp php:5.6-cli /bin/bash
#$ curl -sS https://getcomposer.org/installer | php
#$ exit
docker run -it --rm --name my-running-script -v $(pwd):/usr/src/myapp -w /usr/src/myapp php:5.6-cli php composer.phar install

docker run -it --rm --name my-running-script -v $(pwd):/app -w /app tutum/apache-php php composer.phar install

docker run -it --rm --name my-running-script -v $(pwd):/app -w /app --link some-rabbit:rabbitmq tutum/apache-php php send.php
docker run -it --rm --name my-running-script -v $(pwd):/app -w /app --link some-rabbit:rabbitmq tutum/apache-php php receive.php

docker run -it --rm --name my-running-script -v $(pwd):/app -w /app --link some-rabbit:rabbitmq --link some-mysql:mysql tutum/apache-php php send-mysql.php
docker run -it --rm --name my-running-script -v $(pwd):/app -w /app --link some-rabbit:rabbitmq --link some-mysql:mysql tutum/apache-php php receive-mysql.php
