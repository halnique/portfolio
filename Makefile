DOCKER_COMPOSE_COMMAND=docker-compose

build:
	$(DOCKER_COMPOSE_COMMAND) build

up:
	$(DOCKER_COMPOSE_COMMAND) up -d

down:
	$(DOCKER_COMPOSE_COMMAND) down

clean:
	$(DOCKER_COMPOSE_COMMAND) down -v --remove-orphans

bash:
	$(DOCKER_COMPOSE_COMMAND) exec workspace bash

cloud-build:
	cloud-build-local -dryrun=false .
