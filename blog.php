<?php include_once("./includes/header.php"); ?>
<main>
    <section class="blog">
        <div class="container">
            <h2>BLOG</h2>
            <p>EVERYTHING YOU WANT TO KNOW</p>
            <div class="filters">
                <button data-filter="all">ALL</button>
                <button data-filter="becoming">BECOMING</button>
                <button data-filter="wanderlust">WANDERLUST</button>
                <button data-filter="moments">MOMENTS</button>
                <button data-filter="style">STYLE</button>
            </div>
            <input type="text" name="search" placeholder="Enter a keyword">
            <div class="blog-posts">
                <article data-category="becoming">
                    <a href="blog-post.php">
                        <figure>
                            <img src="./assets/images/blog/thumbnail/post1.jpg" alt="Woman embracing change">
                            <div class="overlay">
                                <span>Read More</span>
                            </div>
                            <figcaption>Woman embracing change</figcaption>
                        </figure>
                        <h3>Embracing Change: Why Life’s Uncertainties Make Us Stronger</h3>
                        <p>A personal take on adapting to life’s twists and turns.</p>
                    </a>
                </article>
                <article data-category="wanderlust">
                    <a href="blog-post.php">
                        <figure>
                            <img src="./assets/images/blog/thumbnail/post2.png" alt="The view from a plane window">
                            <div class="overlay">
                                <span>Read More</span>
                            </div>
                            <figcaption>Travel plane view</figcaption>
                        </figure>
                        <h3>Wanderlust Chronicles: My Most Memorable Travel Experience</h3>
                        <p>A story about a special trip and lessons learned along the way.</p>
                    </a>
                </article>
                <article data-category="style">
                    <a href="blog-post.php">
                        <figure>
                            <img src="./assets/images/blog/thumbnail/post3.jpg" alt="Wardrobe dresses ootd">
                            <div class="overlay">
                                <span>Read More</span>
                            </div>
                            <figcaption>Wardrobe staples</figcaption>
                        </figure>
                        <h3>5 Wardrobe Staples That Never Go Out of Style</h3>
                        <p>A guide to timeless fashion essentials.</p>
                    </a>
                </article>
                <article data-category="moments">
                    <a href="blog-post.php">
                        <figure>
                            <img src="./assets/images/blog/thumbnail/post4.png" alt="A little flower sunset">
                            <div class="overlay">
                                <span>Read More</span>
                            </div>
                            <figcaption>Little flower</figcaption>
                        </figure>
                        <h3>How to Romanticize Your Life and Enjoy the Little Moments</h3>
                        <p>Tips on making everyday life feel special.</p>
                    </a>
                </article>
            </div>
        </div>
    </section>
</main>
<?php include_once("./includes/footer.php"); ?>