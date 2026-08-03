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
                        offsetY: 90,
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





        const navbar = document.querySelector(".fixed-header");
        const stickySections = document.querySelectorAll(".section");

        let mm = gsap.matchMedia();

        stickySections.forEach((parent) => {
        const pinnedWrapper = parent.querySelector(".section-fixed");
        const title = parent.querySelector("h2");

        // Dynamic start/end calculations
        const getStartPos = () => {
            const navHeight = navbar ? navbar.offsetHeight : 0;
            return `top ${navHeight - 1}px`;
        };
        
        const getEndPos = () => `bottom ${pinnedWrapper.offsetHeight + 409}px`;

        // 1. PINNING SCROLLTRIGGER
        ScrollTrigger.create({
            trigger: parent,
            pin: pinnedWrapper,
            pinSpacing: false,
            start: getStartPos,
            end: getEndPos,
            scrub: true,
            invalidateOnRefresh: true
        });

        // 2. ADAPTIVE TITLE ANIMATION
        if (title) {
            // Desktop (1024px and above)
            mm.add("(min-width: 1024px)", () => {
            return createTitleAnimation({
                x: -70,
                y: -180,
            });
            });

            // Mobile (Below 1024px)
            mm.add("(max-width: 1023px)", () => {
            return createTitleAnimation({
                x: -55,
                y: -150,
            });
            });

            function createTitleAnimation(vars) {
            const titleTween = gsap.to(title, {
                ...vars,
                rotate: 90,
                ease: "linear",
                duration: 0.4,
                scale: 0.5,
                paused: true
            });

            const titleTrigger = ScrollTrigger.create({
                trigger: parent,
                start: getStartPos,
                invalidateOnRefresh: true,
                // Ensures the animation syncs if the page loads ALREADY past the trigger point
                onRefresh: (self) => {
                if (self.isActive) {
                    titleTween.progress(1);
                } else if (self.progress === 0) {
                    titleTween.progress(0);
                }
                },
                onEnter: () => titleTween.play(),
                onLeaveBack: () => titleTween.reverse()
            });

            // MatchMedia cleanup function
            return () => {
                titleTween.kill();
                titleTrigger.kill();
                gsap.set(title, { clearProps: "all" });
            };
            }
        }
        });

        // Force ScrollTrigger to calculate positions after DOM is fully ready
        ScrollTrigger.refresh();

        gsap.utils.toArray('.fadeIn').forEach((element) => {
            gsap.from(element, 
            {
                opacity: 0,
                duration: 2,
                ease: 'power4.out',
                scrollTrigger: {
                    trigger: element,
                    start: 'top 90%',
                    end: 'bottom 10%',
                    toggleActions: 'play none none reverse'
                }
            });
        });

        gsap.utils.toArray('.fadeUp').forEach((element) => {
            gsap.from(element, 
            {
                opacity: 0,
                duration: 2,
                x: -50,
                ease: 'power4.out',
                scrollTrigger: {
                    trigger: element,
                    start: 'top 90%',
                    end: 'bottom 10%',
                    toggleActions: 'play none none reverse'
                }
            });
        });

        gsap.utils.toArray('.fadeUpParagraphs').forEach((parent) => {
            const children = parent.querySelectorAll('p');
            gsap.from(children, {
                opacity: 0,
                duration: 2,
                x: -50,
                ease: 'power4.out',
                stagger: 0.2,
                scrollTrigger: {
                    trigger: parent,
                    start: 'top 90%',
                    end: 'bottom 10%',
                    toggleActions: 'play none none reverse'
                }
            });
        });

        gsap.utils.toArray('.box-wrapper').forEach((parent) => {
            const children = parent.querySelectorAll('.box');
            gsap.from(children, {
                opacity: 0,
                y: 50,
                duration: 2,
                ease: 'power4.out',
                stagger: 0.2,
                scrollTrigger: {
                    trigger: parent,
                    start: 'top 90%',
                    end: 'bottom 10%',
                    toggleActions: 'play none none reverse'
                }
            });
        });




        
       console.log("window.loaded");
    }, false)
})