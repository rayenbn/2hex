window._ = require("lodash");
window.axios = require("axios");

let csrf_token = document.head.querySelector('meta[name="csrf-token"]');

if (csrf_token) {
  	window.axios.defaults.headers.common = {
    	'X-Requested-With': 'XMLHttpRequest',
    	'X-CSRF-TOKEN': csrf_token.content
	};
} else {
  	console.error(
    	"CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
  	);
}

if ("serviceWorker" in navigator){
	window.addEventListener("load", () => {
		navigator.serviceWorker.register("/sw.js");
	})
}
