void 0===window.kintMicrotimeInitialized&&(window.kintMicrotimeInitialized=1,window.addEventListener("load",function(){"use strict";var c={},i=Array.prototype.slice.call(document.querySelectorAll("[data-kint-microtime-group]"),0);i.forEach(function(i){if(i.querySelector(".kint-microtime-lap")){var t=i.getAttribute("data-kint-microtime-group"),e=parseFloat(i.querySelector(".kint-microtime-lap").innerHTML),r=parseFloat(i.querySelector(".kint-microtime-avg").innerHTML);void 0===c[t]&&(c[t]={}),(void 0===c[t].min||c[t].min>e)&&(c[t].min=e),(void 0===c[t].max||c[t].max<e)&&(c[t].max=e),c[t].avg=r}}),i.forEach(function(i){var t=i.querySelector(".kint-microtime-lap");if(null!==t){var e=parseFloat(t.textContent),r=i.dataset.kintMicrotimeGroup,o=c[r].avg,n=c[r].max,a=c[r].min;e===(i.querySelector(".kint-microtime-avg").textContent=o)&&e===a&&e===n||(t.style.background=o<e?"hsl("+(40-40*((e-o)/(n-o)))+", 100%, 65%)":"hsl("+(40+80*(o===a?0:(o-e)/(o-a)))+", 100%, 65%)")}})}));
