build:
	docker-compose -f docker-compose.yml -f dev-docker-compose.yml build

up:
	docker-compose -f docker-compose.yml -f dev-docker-compose.yml up -d

down:
	docker-compose -f docker-compose.yml -f dev-docker-compose.yml down

clean:
	docker-compose -f docker-compose.yml -f dev-docker-compose.yml down -v

work:
	docker-compose -f docker-compose.yml -f dev-docker-compose.yml exec workspace bash

test:
	docker-compose -f docker-compose.yml -f dev-docker-compose.yml exec workspace vendor/bin/phpunit

ci:
	cloud-build-local -dryrun=false .
