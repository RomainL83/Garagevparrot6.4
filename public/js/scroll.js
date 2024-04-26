(function () {
    /**
     * Scroll to the section of the given id.
     *
     * @param {string} to
     * @param {string} behavior
     * @param {string} block
     */
    function scrollTo(to, behavior, block) {
      const scroll = document.getElementById('scroll-' + to);
      scroll.onclick = (_) => document.getElementById(to).scrollIntoView({ behavior: behavior, block: block });
    }
  
  })();