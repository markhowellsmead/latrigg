(()=>{"use strict";const t=document.querySelectorAll("[aria-controls]:not([data-standalone-controller])");if(t){var e=t=>{const e=t.currentTarget;let a=document.querySelector("#"+e.getAttribute("aria-controls"));if(a){if(a.dataset.closeAll&&""!==a.dataset.closeAll){const t=document.querySelectorAll(a.dataset.closeAll);t&&t.forEach((t=>{t.setAttribute("aria-hidden","true"),document.querySelectorAll(`[aria-controls="${t.id}"]`).forEach((t=>{t.setAttribute("aria-expanded","false")}))}))}if(e.dataset.close?a.setAttribute("aria-hidden","true"):e.dataset.open?a.setAttribute("aria-hidden","false"):a.setAttribute("aria-hidden","false"==e.getAttribute("aria-expanded")?"false":"true"),document.querySelectorAll(`[aria-controls="${a.id}"]`).forEach((t=>{t.setAttribute("aria-expanded","true"===a.getAttribute("aria-hidden")?"false":"true")})),"false"===a.getAttribute("aria-hidden")&&a.querySelectorAll("input,textarea").length){let t=!1,e=a.querySelectorAll("input,textarea");e.length&&e.forEach((e=>{if(t)return;let r=window.getComputedStyle(e);"none"!==r.display&&"hidden"!==r.visibility&&(a.querySelector("input").focus(),t=!0)}))}a.dataset.toggleStyle&&""!==a.dataset.toggleStyle&&("false"===a.getAttribute("aria-hidden")?a.classList.add(a.dataset.toggleStyle):a.classList.remove(a.dataset.toggleStyle)),a.dataset.rootStyle&&""!==a.dataset.rootStyle&&a.dataset.rootStyle.split(" ").forEach((t=>{"false"===a.getAttribute("aria-hidden")?document.documentElement.classList.add(t):document.documentElement.classList.remove(t)})),e.getAttribute("data-blurme")&&e.blur()}else console.error(`Target #${e.getAttribute("aria-controls")} not found`)};t.forEach((t=>{t.getAttribute("id")===t.getAttribute("aria-controls")&&t.removeAttribute("id"),t.addEventListener("click",e)})),document.querySelector("#mobilemenu")&&(document.querySelector("#mobilemenu").dataset.rootStyle="is--mobilemenu--open",document.querySelector("#mobilemenu").setAttribute("data-hidden","true"))}})();