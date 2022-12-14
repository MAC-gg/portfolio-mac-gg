import { Fancybox } from "@fancyapps/ui/src/Fancybox/Fancybox.js";
import "@fancyapps/ui/dist/fancybox.css";

class MACFancybox {
    constructor() {
        window.Fancybox = Fancybox; // make GLOBAL for debugging

        if(window.innerWidth < 1280) {
            $('[data-fancybox-trigger].no-mobile-fancybox').each(function() {
                    this.removeAttribute("data-fancybox-trigger");
                    this.removeAttribute("data-src");
                    console.log(this);
            });
            $('[data-fancybox].no-mobile-fancybox').each(function() {
                this.removeAttribute("data-fancybox");
                this.removeAttribute("data-src");
                console.log(this);
        });
        }
        Fancybox.bind('[data-fancybox]', { Toolbar: false });
    }
}

export default MACFancybox;