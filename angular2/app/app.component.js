(function(app) {
  app.AppComponent =
    ng.core.Component({
      selector: 'my-app',
      template: '<h1>Polling for changes</h1>'
    })
    .Class({
      constructor: function() {}
    });
})(window.app || (window.app = {}));