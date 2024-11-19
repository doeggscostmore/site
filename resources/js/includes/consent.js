window.dataLayer = window.dataLayer || [];
function gtag() { dataLayer.push(arguments); }

const consentRevokedKey = "consent_revoked"
const consentDismissedKey = "consentDismissed"

const optOutPageLink = document.getElementById('trackingoptout')
const optOutBannerLink = document.getElementById('optoutpopup')
const optOutBannerCloseButton = document.getElementById('optoutdismiss')
const optOutBanner = document.getElementById('consent-banner')

function revokeConsent(event) {
    event.preventDefault();

    localStorage.setItem(consentRevokedKey, "true")
    localStorage.setItem(consentDismissedKey, "true")
    gtag('consent', 'update', {
        'ad_storage': 'denied',
        'ad_user_data': 'denied',
        'ad_personalization': 'denied',
        'analytics_storage': 'denied'
    });

    // Update the link to be better text
    if (optOutPageLink) {
        optOutPageLink.innerHTML = "You've been opted out.";
    }
    if (optOutBannerLink) {
        optOutBannerLink.innerHTML = "You've been opted out."
    }
}

// If we've already revoked consent, we set the default to all denied.  We do
// this so there's no chance the event fires before the rest of this code.
if (localStorage.getItem(consentRevokedKey)) {
    gtag('consent', 'default', {
        'ad_storage': 'denied',
        'ad_user_data': 'denied',
        'ad_personalization': 'denied',
        'analytics_storage': 'denied'
    });

    // Also update our opt out button if it's on the page.
    if (optOutPageLink) {
        optOutPageLink.innerHTML = "You've already opted out of cookies.";
    }
} else {
    gtag('consent', 'default', {
        'ad_storage': 'granted',
        'ad_user_data': 'granted',
        'ad_personalization': 'granted',
        'analytics_storage': 'granted'
    });
}

// Set up our Google object
gtag('js', new Date());
gtag('config', 'G-8QXKWX543K');

if (optOutPageLink) {
    // Listen for the opt out event, then update the consent.
    optOutPageLink.addEventListener("click", revokeConsent);
}
if (optOutBannerLink) {
    // Listen for the opt out event, then update the consent.
    optOutBannerLink.addEventListener("click", revokeConsent);
}

// Display the banner if we haven't dismissed it
if (!localStorage.getItem(consentDismissedKey)) {
    optOutBanner.classList.add('show')
}

// Dismiss the consent pop-up when asked
if (optOutBannerCloseButton) {
    optOutBannerCloseButton.addEventListener("click", function() {
        optOutBanner.classList.remove('show')
        localStorage.setItem(consentDismissedKey, "true")
    });
}