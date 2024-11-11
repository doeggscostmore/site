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