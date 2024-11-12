@extends('layouts.app')

@section('title', 'About | Do Eggs Cost More?')

@section('content')
    <div class="page">
        <div class="hero">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col">
                        <h1>About</h1>
                    </div>
                </div>
            </div>
            <div class="overlay"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>
                        Do Eggs Cost More is a moderatly political site that
                        tracks the prices of common grocery items, and compares
                        them to various key dates after the 2024 election. While
                        political in nature, the data presented is not skewed or
                        modified to make a point (if I'm wrong, I'm wrong).
                    </p>
                    <p>
                        I drew inspiration largely from others who vowed to
                        track grocery prices manually after arguments about
                        grocery prices were made. Since some of this data is
                        available on free APIs, I made use of those and created
                        this cheeky website to summarize what we all really want
                        to know: do eggs cost more than they did.
                    </p>

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
                        I don't modify the data I get and the calculations are
                        accurate to the best of my knowledge, but I'm not a
                        statistician. Please don't form policy or make life
                        altering decisions based on the data I present on this
                        site.  More information about the methods used to
                        collect and calculate data are on the <a
                        href="/methodology">Methodology Page</a>.
                    </p>
                    <p>
                        This site does not use cookies, but we may collect some
                        data from your browser to track statistics for the site.
                    </p>
                    <p>
                        This site is not funded by, endorsed by, or affiliated
                        with any policial party, politician or political action
                        committee; any NGOs; orange cats; or strange men who
                        would describe themselves as chimney enthusiasts.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <footer>
                    &copy; 2024. | <a href="/methodology">Methodology<a> <br />
                    Photo by <a href="https://unsplash.com/@helloimnik?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash" rel="noopener noreferrer">Nik</a> on <a href="https://unsplash.com/photos/brown-eggs-in-a-box-LUYD2b7MNrg?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash"  rel="noopener noreferrer">Unsplash</a>
                </footer>
            </div>
        </div>
    </div>
@endsection
