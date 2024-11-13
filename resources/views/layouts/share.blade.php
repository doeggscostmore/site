<div class="share">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h3>Tell The World</h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
                <a href="https://www.facebook.com/sharer.php?u={{ $canonical }}" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-facebook-f"></i>
                    <span class="sr-only">Share to Facebook</span>
                </a>
                <a href="https://twitter.com/share?url={{ $canonical }}" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-twitter"></i>
                    <span class="sr-only">Share to Twitter</span>
                </a>
                <a href="https://reddit.com/submit?url={{ $canonical }}" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-reddit"></i>
                    <span class="sr-only">Share to Reddit</span>
                </a>
                <a href="https://www.threads.net/intent/post?text={{ urlencode($canonical) }}" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-threads"></i>
                    <span class="sr-only">Share to Threads</span>
                </a>
                <a href="https://bsky.app/intent/post?text={{ urlencode($canonical) }}" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-bluesky"></i>
                    <span class="sr-only">Share to Bluesky</span>
                </a>
            </div>
        </div>
    </div>
</div>