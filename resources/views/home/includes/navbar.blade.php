<div class="loader"><i class="fa fa-refresh fa-spin"></i></div>
        <!--LOader end  -->
        <!--================= main start ================-->
        <div id="main">
            <!--=============== header ===============-->
            <header>
                <!-- Header inner  -->
                <div class="header-inner">
                    <!-- Logo  -->
                    
                    <!--Logo end  -->
                    <!--Navigation  -->
                    <div class="nav-button-holder">
                        <div class="nav-button vis-m"><span></span><span></span><span></span></div>
                    </div>
                    <div class="show-share isShare">Share</div>
                    <div class="share-container isShare" data-share="['facebook','twitter','linkedin']"></div>
                    
                   
                    <div class="nav-holder">
                        <nav>
                            <ul>
                                <li><a href="/" class="nav-link">Home</a></li>
                                <li><a href="{{route('about-us')}}" class="nav-link">About us</a></li>
                                <li><a href="{{route('view-home-portfolio')}}" class="nav-link">Portfolio</a></li>
                                <li><a href="{{route('home-blog')}}" class="nav-link">Blog</a></li>
                                <li><a href="{{route('contact-us')}}" class="nav-link">Contact</a></li>
                            </ul>
                        </nav>
                    </div>

                    <!--navigation end -->
                </div>
                <!--Header inner end  -->
            
            </header>
            <style>
                /* Add the back shadow effect to the active link */
                .nav-link.active-link {
                    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
                }
            </style>
            
            <script>
                // Get all navigation menu links
                const navLinks = document.querySelectorAll('.nav-link');
            
                // Click event handler for the navigation menu links
                function handleClick(event) {
                    // Remove "active-link" class from all links
                    navLinks.forEach(link => link.classList.remove('active-link'));
            
                    // Add "active-link" class to the clicked link
                    event.target.classList.add('active-link');
                }
            
                // Attach the click event handler to each navigation menu link
                navLinks.forEach(link => link.addEventListener('click', handleClick));
            
                // Add "active-link" class to the initially active link
                const currentURL = window.location.href;
                navLinks.forEach(link => {
                    if (link.href === currentURL) {
                        link.classList.add('active-link');
                    }
                });
            </script>