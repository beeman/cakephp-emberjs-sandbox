window.Todos = Ember.Application.create();

Todos.ApplicationAdapter = DS.RESTAdapter.extend({
//    namespace: 'api',
    host: 'http://0.0.0.0:8080'
});

//Todos.ApplicationAdapter = DS.LSAdapter.extend({
//    namespace: 'todos-emberjs'
//});