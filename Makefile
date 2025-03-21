.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t docker-php-string-calculator .

build-container:
	docker run -dt --name docker-php-string-calculator -v .:/540/StringCalculator docker-php-string-calculator
	docker exec docker-php-string-calculator composer install

start:
	docker start docker-php-string-calculator

test: start
	docker exec docker-php-string-calculator ./vendor/bin/phpunit tests/$(target)

shell: start
	docker exec -it docker-php-string-calculator /bin/bash

stop:
	docker stop docker-php-string-calculator

clean: stop
	docker rm docker-php-string-calculator
	rm -rf vendor
