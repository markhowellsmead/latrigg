(()=>{"use strict";!function(e){const t="c-body--no-outline",o=e("body");e((function(){o.addClass(t),e(window).keydown((function(e){9===(e.keyCode?e.keyCode:e.which)&&o.removeClass(t)})),e(window).mousemove((function(e){o.addClass(t)}))}))}(jQuery),document.querySelectorAll('[loading="lazy"]').forEach((e=>{const t=()=>{e.classList.add("is--loaded")};e.complete?t():e.addEventListener("load",t)}));const e=document.querySelectorAll("a");e.length&&(e=>{e.forEach((e=>{var t=e.hostname;""===e.target&&t&&t.indexOf(window.location.hostname)<0&&t.indexOf(window.location.hostname.replace("www.",""))<0&&""!==t&&null!==t&&"undefined"!==t&&"false"!==t&&!1!==t&&(""===t.hash||null===t.hash||void 0===t.hash)&&0!==t.indexOf("javascript")&&t.indexOf("mailto:")<0&&!e.dataset.fancybox&&!e.dataset.fslightbox&&(e.target="_blank",e.setAttribute("rel","noopener"),e.className.indexOf("tooltip")<0&&!e.dataset.tooltip&&e.setAttribute("title",t),e.dataset.maybeSetLinkTarget="true")}))})(e);const t=document.querySelector(".c-masthead"),o=()=>{document.documentElement.style.setProperty("--masthead--height",t.offsetHeight-1+"px"),window.anchorAnimateOffset=t.offsetHeight-1,document.body.classList.contains("admin-bar")&&(window.anchorAnimateOffset+=document.querySelector("#wpadminbar").offsetHeight-1)};t?(window.addEventListener("resize",o),window.addEventListener("orientationchange",o)):document.documentElement.style.setProperty("--masthead--height",0);const n=(e,t)=>{if(t){const t=sht_theme.debug?"":".min";let o=document.createElement("script");o.setAttribute("src",`${sht_theme.directory_uri}/assets/scripts/${e}${t}.js?version=${sht_theme.version}`),document.head.appendChild(o)}};n("fancybox",!0),n("svh",!CSS.supports||!CSS.supports("height","1svh")),n("aria-toggler",!!document.querySelectorAll("[aria-controls]:not([data-standalone-controller])").length),n("cover",document.querySelectorAll(".wp-block-cover").length)})();