
// Our modules / classes
import Fancybox from "./modules/MACfancybox"

// Instantiate a new object using our modules/classes
var MACFancybox = new Fancybox()

// Allow new JS and CSS to load in browser without a traditional page refresh
if (module.hot) {
  module.hot.accept()
}