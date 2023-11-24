<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tempat Transit</title>

    
    {{-- CDN  --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    {{-- StyleCSS Tailwind --}}
    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
   
    <style>
        
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
        #mainContent {
        height: 100%;
        position: relative;
        }
    
        #mainContent {
          height: 50vh;
          /* margin-top: -80px; */
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
        }
    
        .swiper {
          width: 100%;
          height: 100%;
        }
    
        .swiper-slide {
          background-position: center;
          background-size: cover;
          width: 30%;
          height: 80%;
        }
    
        .swiper-slide img {
          display: block;
          width: 100%;
          height: 100%;
          -webkit-box-reflect: below 1px linear-gradient(transparent,transparent, #0002, #0004);
        }

        .bg-transit{
            background:  #15233b;
        }

        .bg-transit2{
            background: #19b3ca;
        }
    
    </style>

</head>
<body class=" overflow-x-hidden ">
    @include('user/partials/navbar')

    @yield('content')


  

    <script src="{{'/assets/js/jquery-3.7.0.js'}}"></script>

     {{-- AlpineJS --}}
     <script src="//unpkg.com/alpinejs" defer></script>
     <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
 
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        loop: true,
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
          coverflowEffect: {
            rotate: 15,
            stretch: 0,
            depth: 300,
            modifier: 1,
            slideShadows: true,
          },
          autoplay: {
          delay: 2500,
          disableOnInteraction: false,
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
          
        });
    </script>

    <script>
       $(document).ready(function() {
            $(window).scroll(function() {
                console.log($(this).scrollTop);
                if ($(this).scrollTop() > 10) {
                    $('#navbar').addClass('bg-[#030312]');
                    $('#navbar').addClass('shadow-md');
                    $('#navbar').addClass('shadow-[#19b3ca]/70');
                    $('#navbar').addClass('backdrop-blur-sm');
                }else{
                    $('#navbar').removeClass('bg-[#030312]');
                    $('#navbar').removeClass('shadow-md');
                    $('#navbar').removeClass('shadow-[#19b3ca]/70');
                    $('#navbar').removeClass('backdrop-blur-sm');
                }
            });

          // Select all links with hashes
          $('a[href*="#"]')
            // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function(event) {
              // On-page links
              if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
                && 
                location.hostname == this.hostname
              ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                  // Only prevent default if animation is actually gonna happen
                  event.preventDefault();
                  $('html, body').animate({
                    scrollTop: target.offset().top
                  }, 1300, function() {
                    // Callback after animation
                    // Must change focus!
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                      return false;
                    } else {
                      $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                      $target.focus(); // Set focus again
                    };
                  });
                }
              }
            });
            
        });

    </script>

    <script> 
      function changeProject(e){
        if(e == "Up"){
          $('#mainProject').addClass('-translate-y-[500%]');

          var $mainProject2 = $('#mainProject2');

          
        // Menghapus kelas "hidden" dan menambahkan kelas "md:grid"
        $('#mainProject2').removeClass('hidden');
        $('#mainProject2').addClass('md:grid');
        $('#mainProject2').removeClass('translate-y-[100%]');

        setTimeout(function() {
          $('#mainProject2').addClass('-translate-y-[100%]');
        }, 100);
        
      }else{
          $('#mainProject').removeClass('-translate-y-[500%]');
          $('#mainProject2').removeClass('-translate-y-[100%]');
          $('#mainProject2').addClass('translate-y-[100%]');

          setTimeout(function() {
            $('#mainProject2').addClass('hidden');
            $('#mainProject2').removeClass('md:grid');
          }, 1000);
          
        }
      }
    </script>

</body>
</html>