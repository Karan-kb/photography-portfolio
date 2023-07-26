<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Keshab Pandey <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('index.admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#homeCollapse" data-toggle="collapse" aria-expanded="true"
        aria-controls="homeCollapse">
        <i class="fas fa-home"></i>
        <span>Home</span>
    </a>

        <div id="homeCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('view-home-photo')}}">View Photo</a>
                <a class="collapse-item" href="{{route('about-us-photo')}}">Add Photo</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#aboutCollapse" data-toggle="collapse" aria-expanded="true"
        aria-controls="aboutCollapse">
        <i class="fas fa-info-circle"></i>
        <span>About Us</span>
    </a>
        <div id="aboutCollapse" class="collapse" aria-labelledby="aboutHeading" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('view-about-photo')}}">View About</a>
                <a class="collapse-item" href="{{route('about-us-details')}}">Add About</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#aboutauthorCollapse" data-toggle="collapse" aria-expanded="true"
            aria-controls="aboutauthorCollapse">
            <i class="fas fa-fw fa-wrench"></i>
            <span>About Author</span>
        </a>
        <div id="aboutauthorCollapse" class="collapse" aria-labelledby="aboutHeading" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('view-about-author')}}">View About Author </a>
                <a class="collapse-item" href="{{route('add-about-author')}}">Add About Author</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#aboutphotoCollapse" data-toggle="collapse" aria-expanded="true"
            aria-controls="aboutphotoCollapse">
            <i class="fas fa-fw fa-wrench"></i>
            <span>About Photo</span>
        </a>
        <div id="aboutphotoCollapse" class="collapse" aria-labelledby="aboutHeading" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('view-about-photo-extra')}}">View About Photo</a>
                <a class="collapse-item" href="{{route('add-about-photo-extra')}}">Add About Photo</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#teamCollapse" data-toggle="collapse" aria-expanded="true"
        aria-controls="teamCollapse">
        <i class="fas fa-users"></i>
        <span>Team</span>
    </a>
        <div id="teamCollapse" class="collapse" aria-labelledby="teamHeading" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('view-team-members')}}">View Team</a>
                <a class="collapse-item" href="{{route('add-team-members')}}">Add Team</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#serviceCollapse" data-toggle="collapse" aria-expanded="true"
        aria-controls="serviceCollapse">
        <i class="fas fa-cogs"></i>
        <span>Services</span>
    </a>
        <div id="serviceCollapse" class="collapse" aria-labelledby="servicesHeading" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('view-service')}}">View Services</a>
                <a class="collapse-item" href="{{route('show-service')}}">Add Services</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#portfolioCollapse" data-toggle="collapse" aria-expanded="true"
            aria-controls="portfolioCollapse">
            <i class="fas fa-fw fa-cog"></i>
            <span>Portfolio</span>
        </a>
        <div id="portfolioCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('view-portfolio')}}">View Portfolio</a>
                <a class="collapse-item" href="{{route('add_portfolio')}}">Add Portfolio</a>
            </div>
        </div>
    </li>



    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#blogCollapse" data-toggle="collapse" aria-expanded="true"
            aria-controls="blogCollapse">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Blog</span>
        </a>
        <div id="blogCollapse" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('view-blog')}}">View Blog</a>
                <a class="collapse-item" href="{{route('blog')}}">Add Blog</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#blogphotoCollapse" data-toggle="collapse" aria-expanded="true"
            aria-controls="blogphotoCollapse">
            <i class="fas fa-image"></i>
            <span>Blog Photo</span>
        </a>
        <div id="blogphotoCollapse" class="collapse" aria-labelledby="aboutHeading" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('view-blog-photo-extra')}}">View Blog Photo</a>
                <a class="collapse-item" href="{{route('add-blog-photo-extra')}}">Add Blog Photo</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#testimonialsCollapse" data-toggle="collapse" aria-expanded="true"
            aria-controls="testimonialsCollapse">
            <i class="fas fa-fw fa-folder"></i>
            <span>Testimonials</span>
        </a>
        <div id="testimonialsCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('view-testimonials')}}">View Testimonials</a>
                <a class="collapse-item" href="{{route('testimonials')}}">Add Testimonials</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#contactCollapse" data-toggle="collapse" aria-expanded="true"
        aria-controls="contactCollapse">
        <i class="fas fa-address-book"></i>
        <span>Contacts</span>
    </a>
        <div id="contactCollapse" class="collapse" aria-labelledby="contactsHeading" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('view-contacts')}}">View Contacts</a>
                <a class="collapse-item" href="{{route('show-contacts')}}">Add Contacts</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#contactphotoCollapse" data-toggle="collapse" aria-expanded="true"
        aria-controls="contactphotoCollapse">
        <i class="fas fa-images"></i>
        <span>Contacts Photo</span>
    </a>
        <div id="contactphotoCollapse" class="collapse" aria-labelledby="contactsHeading" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('view-contacts-photo-extra')}}">View Contacts Photo</a>
                <a class="collapse-item" href="{{route('add-contacts-photo-extra')}}">Add Contacts Photo</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
       <a class="nav-link collapsed" href="#contactlinkCollapse" data-toggle="collapse" aria-expanded="true"
        aria-controls="contactlinkCollapse">
        <i class="fas fa-link"></i>
        <span>Contacts Links</span>
    </a>
        <div id="contactlinkCollapse" class="collapse" aria-labelledby="contactsHeading" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('view-contacts-link')}}">View Contacts Link</a>
                <a class="collapse-item" href="{{route('add-contacts-link')}}">Add Contacts Link</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
         <a class="nav-link collapsed" href="#homemetaCollapse" data-toggle="collapse" aria-expanded="true"
        aria-controls="homemetaCollapse">
        <i class="fas fa-cogs"></i>
        <span>Home Meta</span>
    </a>
        <div id="homemetaCollapse" class="collapse" aria-labelledby="contactsHeading" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('view-home-meta')}}">View Meta</a>
                <a class="collapse-item" href="{{route('add-home-meta')}}">Add Meta</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#aboutmetaCollapse" data-toggle="collapse" aria-expanded="true"
        aria-controls="aboutmetaCollapse">
        <i class="fas fa-cogs"></i>
        <span>About Meta</span>
    </a>
        <div id="aboutmetaCollapse" class="collapse" aria-labelledby="contactsHeading" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('view-meta')}}">View Meta</a>
                <a class="collapse-item" href="{{route('add-meta')}}">Add Meta</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#portfoliometaCollapse" data-toggle="collapse" aria-expanded="true"
        aria-controls="portfoliometaCollapse">
        <i class="fas fa-cogs"></i>
        <span>Portfolio Meta</span>
    </a>
        <div id="portfoliometaCollapse" class="collapse" aria-labelledby="contactsHeading" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('view-portfolio-meta')}}">View Meta</a>
                <a class="collapse-item" href="{{route('add-portfolio-meta')}}">Add Meta</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
       <a class="nav-link collapsed" href="#blogmetaCollapse" data-toggle="collapse" aria-expanded="true"
        aria-controls="blogmetaCollapse">
        <i class="fas fa-cogs"></i>
        <span>Blog Meta</span>
    </a>
        <div id="blogmetaCollapse" class="collapse" aria-labelledby="contactsHeading" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('view-blog-meta')}}">View Meta</a>
                <a class="collapse-item" href="{{route('add-blog-meta')}}">Add Meta</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
       <a class="nav-link collapsed" href="#contactmetaCollapse" data-toggle="collapse" aria-expanded="true"
        aria-controls="contactmetaCollapse">
        <i class="fas fa-cogs"></i>
        <span>Contact Meta</span>
    </a>
        <div id="contactmetaCollapse" class="collapse" aria-labelledby="contactsHeading" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('view-contact-meta')}}">View Meta</a>
                <a class="collapse-item" href="{{route('add-contact-meta')}}">Add Meta</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#clientdetailsCollapse" data-toggle="collapse" aria-expanded="true"
         aria-controls="clientdetailsCollapse">
         <i class="fas fa-cogs"></i>
         <span>client Details</span>
     </a>
         <div id="clientdetailsCollapse" class="collapse" aria-labelledby="contactsHeading" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="">View Client Details</a>
                 <a class="collapse-item" href="{{route('add-client-details')}}">Add Client Details</a>
             </div>
         </div>
     </li>

    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
</ul>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
      $('.nav-link').on('click', function() {
        var targetCollapse = $(this).attr('href');
        var isTargetCollapsed = $(targetCollapse).hasClass('show');
        
        // Check if the clicked collapse is the same as the currently active one
        if ($(targetCollapse).hasClass('show') && $('.collapse.show').length === 1) {
          // Same collapse is clicked, so simply hide it
          $(targetCollapse).collapse('hide');
          $(this).removeClass('active');
        } else {
          // Hide all other collapses
          $('.collapse.show').not(targetCollapse).collapse('hide');
          
          // Show the clicked collapse and set active state
          $(targetCollapse).collapse('show');
          $(this).addClass('active');
        }
      });
      
      // Hide collapses when clicking outside the sidebar
      $(document).on('click', function(e) {
        if ($(e.target).closest('.navbar-nav').length === 0) {
          $('.collapse.show').collapse('hide');
          $('.nav-link').removeClass('active');
        }
      });
    });
  </script>
  


