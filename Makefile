up:
	docker-compose up -d

down:
	docker-compose down

clean:
	docker-compose down -v

work:
	docker-compose exec workspace bash
