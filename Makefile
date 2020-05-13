docker-start:
	docker-compose -f docker-compose.yml -f docker-compose.utils.yml up -d --build
docker-down:
	docker-compose -f docker-compose.yml -f docker-compose.utils.yml down
docker-bash:
	docker exec -ti app bash