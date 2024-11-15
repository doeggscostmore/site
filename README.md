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
