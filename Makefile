build:
	rm -f public/hot
	tmux new-session './vendor/bin/sail up' \; split-window -h 'make js-dev' \;

yarn:
	yarn install

js-dev: yarn
	yarn run dev

js: yarn
	yarn run build

composer:
	composer install --ansi --no-interaction --no-progress --no-dev -o

composer-dev:
	composer install --ansi --no-interaction --no-progress -o

get-db:
	scp -P 2222 doeggscostmore.com@10.10.0.23:backups/db/app-latest.sql.gz app.sql.gz
	gunzip app.sql.gz
	./vendor/bin/sail mysql < app.sql
	rm app.sql