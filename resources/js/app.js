import "./bootstrap";
import "flowbite";
import $ from "jquery";
window.jQuery = $;
window.$ = $;
// import justifiedGallery from "justifiedGallery";
// window.justifiedGallery = justifiedGallery;

window.addEventListener("popstate", function (event) {
    window.location.reload();
});
