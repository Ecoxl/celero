require.config({
  shim: {
    'com/sencha/ext-js/3.4.1.1/ext-all': {
      deps: ['public/com/sencha/ext-js/3.4.1.1/adapter/ext/ext-base.js'],
      exports: 'Ext'
    }
  }
});
define(["require", "com/sencha/ext-js/ext-all"], function(require, Ext) {
  // dynamically add Ext's CSS to the document, so clients do not have to know or compute the path:
  var cssElement = document.createElement("link");
  cssElement.setAttribute('rel', "stylesheet");
  cssElement.setAttribute('type', "text/css");
  cssElement.setAttribute('href', require.toUrl("com/sencha/ext-js/resources/css/ext-all.css"));
  document.body.appendChild(cssElement);
  return Ext;
});
