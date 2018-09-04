
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

$('.btn').on('click', function() {
  var $this = $(this);
  var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
  if ($(this).html() !== loadingText) {
    $this.data('original-text', $(this).html());
    $this.html(loadingText);
  }
  setTimeout(function() {
    $this.html($this.data('original-text'));
  }, 6000);
});

$('#type').on('change',function(){
    if( $(this).val()==="recurring"){
    $("#recurring").show()
    }
    else{
    $("#recurring").hide()
    }
});
