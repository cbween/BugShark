
var BugShark = BugShark || {}


/*
 * Utility functions
 */
BugShark.utils = {
    renderTemplate: function(id, data) {
        var template = $('#template-' + id).text()
        return Mustache.render(template, data)
    },

    /*
     * An empty function
     */
    empty: function empty() {}
}

/*
 * Contains the Backbone.js models
 */
BugShark.models = {}


BugShark.collections = {}


BugShark.views = {}

BugShark.views.ToolBar = Backbone.View.extend({
    el: '#bugshark-toolbar',

    events: {
        //
    }
})

BugShark.tools = new BugShark.views.ToolBar()
