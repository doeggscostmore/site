import praw
from dotenv import load_dotenv
import os
import logging
import requests
import time

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
url = os.getenv('APP_URL')

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

# This is the loop that does the work.  We break out every so often to let us
# restart and get a new list of subreddits.
def work():
    logging.info('Fetching list of subreddits')
    resp = requests.get(url + '/api/reddit/subreddits', headers=headers)
    subreddits = resp.json()['data']

    logging.info('Starting comment loop')
    t = time.time()
    subreddit = reddit.subreddit(",".join(subreddits))
    for comment in subreddit.stream.comments(skip_existing=True, pause_after=1):
        if time.time() > t + 3600:
            logging.info("Breaking comment loop to get new subreddits")
            return #the loop below will restart this
        
        if comment is None:
            continue

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

        requests.post(url + '/api/reddit/comment', headers=headers, data=data)

while True:
    work()