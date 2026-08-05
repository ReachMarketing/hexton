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
        //const title = parent.querySelector("h2");

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
        /*if (title) {
            // Desktop (1024px and above)
            mm.add("(min-width: 1024px)", () => {
            return createTitleAnimation({
                x: -80,
                y: -180,
            });
            });

            // Mobile (Below 1024px)
            mm.add("(max-width: 1023px)", () => {
            return createTitleAnimation({
                x: -52,
                y: -150,
            });
            });

            function createTitleAnimation(vars) {
            const titleTween = gsap.to(title, {
                ...vars,
                rotate: 90,
                ease: "linear",
                duration: 0.3,
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
        }*/
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


        gsap.utils.toArray('.box-wrapper').forEach((parent, wrapperIndex) => {
        const children = parent.querySelectorAll('.boxFade');

        // STEP 1: PRE-SET initial states & BUILD all timelines ONCE
        children.forEach((box, boxIndex) => {
            // Prevent Flash of Unstyled Content (FOUC)
            gsap.set(box, { opacity: 0, y: 50 });

            // DYNAMIC ID FIX: Unique clipPath per box
            const clipPath = box.querySelector('clipPath');
            const clippedElement = box.querySelector('[clip-path]');

            if (clipPath && clippedElement) {
            const uniqueId = `clip-${wrapperIndex}-${boxIndex}`;
            clipPath.id = uniqueId;
            clippedElement.setAttribute('clip-path', `url(#${uniqueId})`);
            }

            const clipPathsToAnimate = box.querySelectorAll('path.star2-geo');
            const singlePath = box.querySelector('path.extra-circle');

            // Create a PAUSED timeline attached to the box element
            const boxTl = gsap.timeline({ paused: true });

            // Step A: Parent box fade & move up
            boxTl.to(box, {
            opacity: 1,
            y: 0,
            duration: 2,
            ease: 'power4.out',
            });

            // Step B: Clip path animation
            if (clipPathsToAnimate.length > 0) {
            boxTl.from(clipPathsToAnimate, {
                x: 0,
                y: 0,
                duration: 2,
                ease: 'power4.inOut',
            }, '<-0.4');
            }

            // Step C: Extra circle path animation
            if (singlePath) {
            boxTl.from(singlePath, {
                x: -10,
                y: 10,
                opacity: 0,
                duration: 0.7,
                ease: 'power2.out',
            }, '<1.05');
            }

            // Attach pre-built timeline to the DOM node for reuse
            box._boxTl = boxTl;
        });

        // STEP 2: Use batch to smoothly resume/reverse pre-built timelines on scroll
        ScrollTrigger.batch(children, {
            start: 'top 90%',
            end: 'bottom 10%',
            interval: 0.2,
            onEnter: (batch) => {
            batch.forEach((box, index) => {
                if (box._boxTl) {
                // Play forward smoothly from CURRENT progress (no jumping)
                gsap.delayedCall(index * 0.2, () => box._boxTl.play());
                }
            });
            },
            onLeaveBack: (batch) => {
            batch.forEach((box) => {
                if (box._boxTl) {
                // Reverse smoothly from CURRENT progress
                box._boxTl.reverse();
                }
            });
            }
        });
        });

        gsap.utils.toArray('.small-box-wrapper').forEach((parent) => {
            const children = parent.querySelectorAll('.boxFade');
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

        gsap.utils.toArray('.team').forEach((parent) => {
            const children = parent.querySelectorAll('.team-profile');
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

        


        const svg = document.querySelector("#animated-svg");

        // Create timeline
        const hoverTl = gsap.timeline({ 
        paused: true, 
        defaults: { duration: 0.35, ease: "power2.out" } 
        });

        hoverTl
        // Layer_3 (Polygon_3) stays at 0
        // Layer_2 moves 10px upward in screen space
        .to("#Layer_1", { y: 5 })
        // Layer_1 moves 20px upward, starting 0.08s after Layer_2 begins
        .to("#Layer_2", { y: 10 }, "<0.08");

        // Trigger on hover
        svg.addEventListener("mouseenter", () => hoverTl.play());
        svg.addEventListener("mouseleave", () => hoverTl.reverse());


        
       console.log("window.loaded");
    }, false)
})