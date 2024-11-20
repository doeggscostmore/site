# Do Eggs Cost More

Code for the site at https://doeggscostmore.com.

All this code is released under  Attribution-ShareAlike 4.0 International, see
https://creativecommons.org/licenses/by-sa/4.0/

If you're looking at this site on Git Hub, this repository is a mirror from a
private Git / Build server.  I watch issues and the like, but the code is only
synced here a few times per day.

## Contributing

This project is based on Laravel 11, so follow the docs for guidelines and
principals there.  Builds take place on a private server and aren't linked here,
so don't expect any pipeline results to be in your MR.

Feel free to open issues, as noted above I do monitor things here and should
reply in a somewhat timely manner.

## How This Site Works

This site runs Laravel, but since the pages are all fairly static, we export the
site as a static site.  This site is exported each out into `/static`, then we
point the CDN into that.  The site works locally as a normal PHP site so you can
debug and build things like any other site.

This probably breaks some features and makes things a bit weird in edge cases,
but we don't worry about that on this site.

# A note on BLS Series IDs

The BLS publishes a ton of data, and it's very well organized, though the system
takes a moment to understand.

Each item they track has a code, and the longer the code the higher specificity
it has.  For example, 08 refers to a group of goods, 081 refers to lumber,
081107 refers to softwood lumber.  The place you'll find this is
[here](https://www.bls.gov/web/ppi/ppi_dr.pdf) for the PPI and here for the CPI.

We then need to determine the series ID for that value, which for the PPI is
WPS1234, where WP and fixed, S is either an S for seasonally adjusted data or a
U for unadjusted data, then the commodity code.

Adjusted data accounts for normal price trends throughout the year, such as
seasonality.  For example, a product may always cost more at the end of the
year.  The adjusted price will handle this normal variance and show us the price
changes that are more abnormal.
