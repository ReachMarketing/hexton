// register plugins
gsap.registerPlugin(ScrollTrigger, ScrollSmoother, ScrollToPlugin);

// wait until DOM is ready
document.addEventListener("DOMContentLoaded", function(event) {
    //console.log('Dom loaded');
    

    // wait until images, links, fonts, stylesheets, and js is loaded
    window.addEventListener("load", function(e) {

        // Detect if a link's href goes to the current page
        function getSamePageAnchor (link) {
            if (
                link.protocol !== window.location.protocol ||
                link.host !== window.location.host ||
                link.pathname !== window.location.pathname ||
                link.search !== window.location.search
            ) {
                return false;
            }

            return link.hash;
        }

        // Scroll to a given hash, preventing the event given if there is one
        function scrollToHash(hash, e) {
            const elem = hash ? document.querySelector(hash) : false;
            if(elem) {
                if(e) e.preventDefault();
                gsap.to(window, {
                    scrollTo: {
                        y: elem,
                        autoKill: true
                    },
                    ease: 'power4.out',
                    duration: 1.5
                });
            }
        }

        // If a link's href is within the current page, scroll to it instead
        document.querySelectorAll('a[href]').forEach(a => {
            a.addEventListener('click', e => {
                scrollToHash(getSamePageAnchor(a), e);
            });
        });

        // Scroll to the element in the URL's hash on load
        scrollToHash(window.location.hash);


        // Calculate how far the button is from the very bottom of the screen
        const buttonBottomOffset = 0; 

        gsap.fromTo(".contact-sidebutton", 
            {
                y: 0
            },
            {
                // Moves the button up in perfect sync with the scrolling footer
                y: () => {
                    const footerHeight = document.querySelector("#contactus").offsetHeight;
                    return -(footerHeight + buttonBottomOffset);
                },
                ease: "none",
                scrollTrigger: {
                    trigger: "#contactus",
                    start: "top bottom",
                    end: "bottom bottom",
                    scrub: true,
                    invalidateOnRefresh: true,
                }
            }
        );


        gsap.from(".fixed-header .logo", {
            opacity: 0,
            duration: 1,
            ease: 'power4.out',
            scrollTrigger: {
                trigger: 'section.intro',
                start: "top top",
                toggleActions: "play none none reverse" 
            }
        });

        gsap.from(".fixed-header .navigation", {
            opacity: 0,
            duration: 1,
            ease: 'power4.out',
            scrollTrigger: {
                trigger: 'section.intro .red-box',
                start: "bottom top",
                toggleActions: "play none none reverse" 
            }
        });


        const sections = gsap.utils.toArray("section");
        const navLinks = gsap.utils.toArray(".fixed-header .navigation a");
        sections.forEach((section, index) => {
            ScrollTrigger.create({
                trigger: section,
                start: "top center", // Adjust trigger points to match your design
                end: "bottom center",
                toggleClass: {
                    targets: navLinks[index - 2], 
                    className: "active"
                }
            });
        });

        
       console.log("window.loaded");
    }, false)
})