#!/bin/bash

set -e
set -x

curl -X POST "https://api.cloudflare.com/client/v4/zones/${ZONE_ID}/purge_cache" -H "Authorization: Bearer {$CF_API_KEY}" -H "Content-Type: application/json" --data '{"purge_everything":true}'