.PHONY: build

build-image:
	docker build . --tag 'codesai-php-katas'

build:
	docker run --rm --interactive --tty --volume $$PWD:/app codesai-php-katas composer install

test:
	docker run --rm --interactive --tty --volume $$PWD:/app codesai-php-katas exec "phpunit"

coverage:
	docker run --rm --interactive --tty --volume $$PWD:/app codesai-php-katas exec "phpunit --coverage-html reports/coverage"

mutation-test:
	docker run --rm --interactive --tty --volume $$PWD:/app codesai-php-katas exec infection
