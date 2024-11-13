window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}

const storageKey = "consent_revoked"
const optOutLink = document.getElementById('trackingoptout')

// If we've already revoked consent, we set the default to all denied.  We do
// this so there's no chance the event fires before the rest of this code.
if (localStorage.getItem(storageKey)) {
    gtag('consent', 'default', {
        'ad_storage': 'denied',
        'ad_user_data': 'denied',
        'ad_personalization': 'denied',
        'analytics_storage': 'denied'
    });

    // Also update our opt out button if it's on the page.
    if (optOutLink) {
        optOutLink.innerHTML = "You've already opted out.";
    }
} else {
    gtag('consent', 'default', {
        'ad_storage': 'denied',
        'ad_user_data': 'denied',
        'ad_personalization': 'denied',
        'analytics_storage': 'granted'
    });
}

// Set up our Google object
gtag('js', new Date());
gtag('config', 'G-8QXKWX543K');

// Listen for the opt out event, then update the consent.
optOutLink.addEventListener("click", function(event) {
    event.preventDefault();

    localStorage.setItem(storageKey, "true")
    gtag('consent', 'update', {
        'ad_storage': 'denied',
        'ad_user_data': 'denied',
        'ad_personalization': 'denied',
        'analytics_storage': 'denied'
    });

    // Update the link to be better text
    optOutLink.innerHTML = "You've been opted out.";
});
