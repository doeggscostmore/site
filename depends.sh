#!/bin/bash

set -e
set -x

# Run the composer and yarn upgrades, check for a diff
composer update
yarn upgrade

if [[ ! `git status --porcelain` ]]; then
    echo "No dependencies changed with an update."
    exit
fi

