var BugShark = BugShark || {}


/*
 * Utility functions
 */
BugShark.utils = {
    renderTemplate: function(id, data) {
        var template = BugShark.templates[id]
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


/*
 * Not ideal, but it'll have to do for now
 */
BugShark.templates = {
    toolbar:
        '<div id="bugshark-toolbar">' +
            '<div class="heading">Feedback</div>' +
            '<div class="content">' +
                '<textarea rows="4" cols="20"></textarea>' +
            '</div>' +
        '</div>'
}


BugShark.views = {}

BugShark.views.ToolBar = Backbone.View.extend({
    events: {
        //
    },

    initialize: function Toolbar_initialize() {
        var html = BugShark.utils.renderTemplate('toolbar')
        $(document.body).append(html)
    }
})

BugShark.tools = new BugShark.views.ToolBar()
