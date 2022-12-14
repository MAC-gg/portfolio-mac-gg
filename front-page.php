<?php
    get_header(); // grabs Header.php
?>
<main id="primary" class="site-main">
    <!-- front-page.php -->
    <section id="page-header">
        <div class="container">
            <div class="header-paper-bg-img" style="background-image:url(<?php echo get_theme_file_uri('/img/header-paper-bg-blank.png'); ?>)">
                <div class="header-container">
                    <h1>Extended<br />Resume</h1>
                </div>
            </div>
        </div>
    </section>
    <div id="mac-front-page-container">
        <!-- Resume container -->
        <div id="mac-resume-page-container" class="container">
            <div class="row">
                <div class="col-md-4 mac-resume-left-col mac-purple-bg">
                    <div class="profContainer">
                        <img src="<?php echo get_theme_file_uri('/img/circleLinkedInPic-250.png'); ?>" />
                        <h2>Matthew A Cooper</h2>
                        <p class="large">Web Developer</p>
                    </div>
                    <div class="mac-info-section">
                        <div class="mac-info-section-container">
                            <h5><i class="fa fa-user"></i>About Me</h5>
                            <p>A web developer and WordPress master making any web design or online system a reality for small to medium businesses. An analytical and creative thinker looking to build experience with React, API integrations, and custom WordPress plugins. Interested in building more complex systems and applications through web or software development, particularly the efforts behind UI and UX.</p>
                        </div>
                        <div class="mac-info-section-container">
                            <h6><a href="tel:4848882866"><i class="fa fa-phone"></i>(484) 888-2866</a></h6>
                        </div>
                        <div class="mac-info-section-container">
                            <h6><a href="mailto:mc669756@gmail.com"><i class="fa fa-envelope"></i>mc669756@gmail.com</a></h6>
                        </div>
                        <div class="mac-info-section-container">
                            <h6><a href="https://github.com/MAC-gg" target="_blank"><i class="fab fa-github"></i>My GitHub Profile</a></h6>
                        </div>
                        <!-- <div class="mac-info-section-container">
                            <h6><a href="https://www.linkedin.com/in/MACamillion/" target="_blank"><i class="fa fa-linkedin"></i>My LinkedIn Profile</a></h6>
                        </div> -->
                    </div>
                    <div class="mac-pro-skills">
                        <div class="mac-pro-skills-container header">
                            <h5><i class="fas fa-clipboard-check"></i>Professional Skills</h5>
                        </div>
                        <div class="mac-pro-skills-container">
                            <?php $args = array(
                                'taxonomy' => 'skills',
                                'orderby' => 'count',
                                'order' => 'DESC'
                            );
                            $skills = get_terms($args);
                            foreach($skills as $skill) { ?>
                                <span class="tag"><?php echo $skill->name; ?> - <?php echo $skill->count; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mac-resume-right-col">
                    <div class="mac-info-section">
                        <h4><i class="fa fa-briefcase"></i>Experience</h4>
                        <div class="mac-info-section-container">
                            <h5>Web Developer <span>at Miles Technologies (Remote)</span></h5>
                            <h6>May 2021 - Current</h6>
                            <ul>
                                <li>Using a WordPress custom template, build and develop branded websites for small to medium businesses. With custom post types and WordPress REST API, I was able to build features like pagination, filters, and searches.</li>
                                <li>Responsible for updating and maintaining a dozen or more websites on a monthly basis. Through this process, I have learned Webflow, React, Joomla, and others, in order to fill maintenance or change requests.</li>
                                <li>Develop websites and their features to a mockup design, involving implementation of third-party Javascript and APIs for animations, sliders, and galleries.</li>
                                <li>Assorted other experience originating from small projects and support tickets include SEO, campaign tracking, graphic design, and email coding.</li>
                            </ul>
                        </div>
                        <div class="mac-info-section-container">
                            <h5>Marketing Director <span>at Paper Net Advertising (Ocala, FL)</span></h5>
                            <h6>Jan 2019 - Jan 2020</h6>
                            <ul>
                                <li>Using WordPress, sell and build client websites, which offered SEO optimization, responsive design, eCommerce, and more. These projects were built using a custom theme that utilizes Bootstrap, theme options page, and custom menu sections.</li>
                                <li>Coordinate and oversee the layout and production process of two magazines distributed monthly to over 125,000 homes. Some months included a third magazine distributed less consistently.</li>
                                <li>Design and distribute marketing and brand materials to help the company gain and retain regular clients. Materials like website, ads in our magazines, media kit, logo, rate cards, and schedules.</li>
                            </ul>
                        </div>
                        <div class="mac-info-section-container">
                            <h5>WordPress Developer <span>at Milky Way Digital (Remote)</span></h5>
                            <h6>Sept 2016 - Nov 2018</h6>
                            <ul>
                                <li>Built responsive websites and custom applications to be used as tools to help small businesses increase efficiency and lead generation. Developed and vetted intricate workflows to be used for scheduling, reservations, and more.</li>
                                <li>Projects were built with existing WordPress themes that fit the business' brand and integrates SEO, custom plugins using PHP and JavaScript, and page builders like Visual Composer.</li>
                            </ul>
                        </div>
                        <div class="mac-info-section-container">
                            <h5>Junior Web Developer <span>at Comcast Spectra (Exton, PA)</span></h5>
                            <h6>May 2014 - Sept 2016</h6>
                            <ul>
                                <li>Established and maintained a development environment and product showcase. This allowed potential clients to view a portfolio of our work and allowed team members to track the progress of current projects.</li>
                                <li>Using client brand standards and design, assembled information centers for season ticket holders for major sports and other venue communities. These projects were built using MySQL, Bootstrap, HTML, CSS, and JavaScript.</li>
                            </ul>
                        </div>
                        <div class="mac-info-section-container">
                            <h5>Intern <span>at West Chester University (West Chester, PA)</span></h5>
                            <h6>Jan 2011 - May 2014</h6>
                            <ul>
                                <li>Worked with a team to redesign our large website to move towards a responsive and clean solution featuring common web practices from other prominent universities.</li>
                                <li>Developed interacting and dynamic applications using MySQL and C# to help students and teachers connect.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="mac-info-section">
                        <h4><i class="fa fa-graduation-cap"></i>Education</h4>
                        <div class="mac-info-section-container">
                            <h5>B.S. Computer Science <span>at West Chester University (West Chester, PA)</span></h5>
                            <h6>May 2017</h6>
                            <p>Minors include Web Technology and Studio Art with focus on Graphic Design</p>
                            <ul>
                                <li>Designed and built my first WordPress website from concept to completion which included regular blog posts and podcasts.</li>
                                <li>Learned about design elements like typography, layout, and branding through projects involving book covers, brochures, and creative lists.</li>
                                <li>Developed complex object-oriented applications with Java and PHP</li>
                                <li>Studied common computer system vulnerabilities and used them to attack and defend systems in an isolated environment.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="mac-info-section">
                        <h4><i class="fa fa-thumbs-up"></i>Interests</h4>
                        <div class="mac-info-section-container row">
                            <div class="col-md-2 mac-interest">
                                <i class="fas fa-pennant"></i>
                                <h6>Sports</h6>
                            </div>
                            <div class="col-md-2 mac-interest">
                                <i class="fas fa-hat-chef"></i>
                                <h6>Cooking</h6>
                            </div>
                            <div class="col-md-2 mac-interest">
                                <img src="<?php echo get_theme_file_uri('/img/frisbee-icon.png'); ?>" />
                                <h6>Ultimate Frisbee</h6>
                            </div>
                            <div class="col-md-2 mac-interest">
                                <i class="fas fa-gamepad"></i>
                                <h6>Video Games</h6>
                            </div>
                            <div class="col-md-2 mac-interest">
                                <i class="fab fa-discord"></i>
                                <h6>Discord</h6>
                            </div>
                            <div class="col-md-2 mac-interest">
                                <i class="fab fa-twitch"></i>
                                <h6>Twitch</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
    get_footer(); // grabs Footer.php
?>