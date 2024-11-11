@extends('layouts.app')

@section('title', 'Do Eggs Cost More?')

@section('content')
    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>About</h1>
                    <p>
                        Do Eggs Cost More is a slightly political site that
                        tracks the prices of common grocery items, and compares
                        them to January 20, 2025. While political in nature,
                        the data presented is not skewed or modified to make a
                        point (if I'm wrong, I'm wrong).
                    </p>
                    <p>
                        I drew inspiration largely from others who vowed to
                        track grocery prices manually after the 2024 election.
                        Since some of this data is available on free APIs, I
                        made use of those and created this cheeky website to
                        summarize what we all really want to know: do eggs cost
                        more than they did.
                    </p>

                    <h2>Methodolgy</h2>
                    <p>
                        The data is collected twice a day from 10 grocery store
                        locations that belong to the same chain. The locations
                        are spread across their operating area.
                    </p>
                    <p>
                        For each category of item (eggs, milk, etc), we're
                        getting at least 3 specific products and their prices
                        from the grocery store. These items are not selected in
                        any particular way, but they include a mix of variaties,
                        brands, sizes, etc. More are added periodically, but
                        around 40 specific items are tracked at the start.
                    </p>
                    <p>
                        I'm not sharing the specific store or products for two
                        reasons:
                    </p>
                    <ul>
                        <li>
                            The specific products and stores are immiterial to
                            the point I'm making. This isn't a tracker for a
                            specific price of eggs at a specific store, but a
                            general look at the cost of eggs.
                        </li>
                        <li>
                            The grocery store may or may not be OK with my use
                            of the API in this way. They don't say I can't, so I
                            guess that means I can?
                        </li>
                    </ul>

                    <h2>Contact</h2>
                    <p>
                        This site is run anonymously. I know what happens when
                        you put an email on the internet, and I know what
                        happens when you point out someone is wrong. If you
                        absolutely need to get a hold of me, you should already
                        know where to look.
                    </p>

                    <h2>Terms / Legal / Privacy</h2>
                    <p>
                        Feel free to link to this site, cite it, etc.  The data
                        is and source code is released under the <a
                        href="https://creativecommons.org/licenses/by-sa/4.0/"
                        rel="noopener noreferrer">Attribution-ShareAlike 4.0
                        International</a> license.  The source code is available
                        <a href="https://github.com/doeggscostmore/site"
                        rel="noopener noreferrer">on GitHub.</a>
                    </p>
                    <p>
                        I don't modify the data I get and the caluclations are
                        accurate to the best of my knowledge, but I'm not a
                        statistician. Please don't form policy or make life
                        altering decisions based on the data I present on this
                        site.
                    </p>
                    <p>
                        This site does not use cookies, but we may collect some
                        data from your browser to track statistics for the site.
                    </p>
                    <p>
                        This site is not funded by, endorsed by, or affiliated
                        with any policial party, politician or political action
                        comittee; any NGOs; orange cats; or strange men who
                        would describe themselves as chimney enthusiasts.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <footer>
                    &copy; 2024.
                </footer>
            </div>
        </div>
    </div>
@endsection
