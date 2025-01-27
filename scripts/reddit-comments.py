import praw
from dotenv import load_dotenv
import os
import logging
import requests

logging.basicConfig(level=logging.INFO, format='%(asctime)s %(message)s')

# Use the same Laravel config file to make thing easy.
logging.info('Loading config from .env')
load_dotenv()

api_token = os.getenv('INTERNAL_API_TOKEN')
reddit_secret = os.getenv('REDDIT_SECRET')
reddit_app_id = os.getenv('REDDIT_APP_ID')
reddit_username = os.getenv('REDDIT_USERNAME')
reddit_password = os.getenv('REDDIT_PASSWORD')
user_agent = os.getenv('REDDIT_USER_AGENT')
url = os.getenv('APP_URL') + '/api/reddit/comment'

logging.info('Setting up reddit instance')
reddit = praw.Reddit(
    client_id = reddit_app_id,
    client_secret = reddit_secret,
    password = reddit_password,
    user_agent = user_agent,
    username = reddit_username,
)

# Some common things for our requests
headers = {
    "X-Token": api_token
}

logging.info('Starting comment loop')
subreddit = reddit.subreddit("all")
for comment in subreddit.stream.comments(skip_existing=True):
    # We use substr because it's faster than a regex and is much more strict.
    if not comment.body.startswith("!doeggscostmore"):
        continue

    # sanity check to prevent sending a very long message into the API
    if len(comment.body) > 200:
        continue

    logging.info("processing comment id %s" % comment.id)
    data = {
        "comment": comment.id,
        "body": comment.body.strip("!"),
    }

    requests.post(url, headers=headers, data=data)